<?php

require('conexao.php');

$id_item = intval($_GET['id']);

$sql = "SELECT id_barbearia FROM item WHERE id_item = $id_item";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id_barbearia = $row['id_barbearia'];

$dia_da_semana;

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'getData':
            // Verifica se o parâmetro diaSemana está presente
            $diaSemana = isset($_GET['diaSemana']) ? $_GET['diaSemana'] : null;
            $dataInput = isset($_GET['dataInput']) ? $_GET['dataInput'] : null;
            // Consulta SQL para obter os dias da semana em que as colunas estão vazias
            $sql = "SELECT 
                        h.id_barbearia,
                        IF(h.domingo = '', 'domingo', NULL) AS domingo,
                        IF(h.segunda = '', 'segunda', NULL) AS segunda,
                        IF(h.terca = '', 'terca', NULL) AS terca,
                        IF(h.quarta = '', 'quarta', NULL) AS quarta,
                        IF(h.quinta = '', 'quinta', NULL) AS quinta,
                        IF(h.sexta = '', 'sexta', NULL) AS sexta,
                        IF(h.sabado = '', 'sabado', NULL) AS sabado
                    FROM horario h
                    WHERE h.id_barbearia = ?";

            // Prepare e execute a consulta com o parâmetro
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_barbearia);
            $stmt->execute();

            $result = $stmt->get_result();

            // Converter resultado em um array associativo
            $dados = array();
            while ($linha = $result->fetch_assoc()) {
                $diasVazios = array_filter($linha, function ($valor) {
                    return $valor !== null;
                });

                $dados[] = array_values($diasVazios);
            }

            $stmt->close();  // Certifique-se de fechar o statement após utilizá-lo

            echo json_encode($dados);
            break;

        case 'getHora':
            // Obtém o dia da semana enviado via parâmetro GET
            $dia_da_semana = $_GET['diaSemana'];
            $dataInput = $_GET['dataInput'];

            // Consulta SQL para obter o horário e intervalo do dia atual
            $sql = "SELECT $dia_da_semana, intervalo FROM horario WHERE id_barbearia = ? LIMIT 1";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_barbearia);
            $stmt->execute();

            // Obter o resultado
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                // Obtém os dados da primeira linha
                $row = $resultado->fetch_assoc();

                // Verifica se a barbearia está fechada no dia atual
                if (empty($row[$dia_da_semana])) {
                    echo "fechado";
                } else {
                    // Divide o horário em períodos (manhã e tarde)
                    $periodos = explode('/', $row[$dia_da_semana]);

                    // Array para armazenar os horários disponíveis
                    $horarios_disponiveis = array();

                    foreach ($periodos as $periodo) {
                        // Divide o período em horário de início e fim
                        list($inicio, $fim) = explode('-', $periodo);

                        // Converte o horário de início e fim para o formato DateTime
                        $inicio = DateTime::createFromFormat('H:i', $inicio);
                        $fim = DateTime::createFromFormat('H:i', $fim);

                        // Converte o intervalo para o formato DateInterval
                        $intervalo = explode(':', $row['intervalo']);
                        $intervaloEmSegundos = $intervalo[0] * 3600 + $intervalo[1] * 60;
                        $intervalo = new DateInterval('PT' . $intervaloEmSegundos . 'S');

                        // Gera os horários disponíveis para o período atual
                        for ($i = $inicio; $i <= $fim; $i->add($intervalo)) {
                            $horario = $i->format('H:i');

                            // Pega a hora atual
                            $hora_atual = new DateTime();

                            // Converte o horário e a hora atual para o formato DateTime
                            $horarioDateTime = DateTime::createFromFormat('H:i', $horario);
                            $hora_atualDateTime = DateTime::createFromFormat('H:i', $hora_atual->format('H:i'));
                    
                            // Se a data selecionada for a data atual e o horário for menor que a hora atual, pule para a próxima iteração
                            if ($dataInput == $hora_atual->format('Y-m-d') && $horarioDateTime < $hora_atualDateTime) {
                                continue;
                            }
                            // Consulta SQL para verificar se o horário já está agendado
                            $sql_agendamento = "SELECT 1 FROM agendamento WHERE data = ? AND horario = ? AND id_barbearia = ? AND pendente = 1 LIMIT 1";
                            $stmt_agendamento = $conn->prepare($sql_agendamento);
                            $stmt_agendamento->bind_param("ssi", $dataInput, $horario, $id_barbearia);
                            $stmt_agendamento->execute();

                            // Obter o resultado
                            $resultado_agendamento = $stmt_agendamento->get_result();

                            // Se o horário não estiver agendado, adicione-o à lista de horários disponíveis
                            if ($resultado_agendamento->num_rows == 0) {
                                $horarios_disponiveis[] = $horario;
                            }

                            // Fechar a declaração
                            $stmt_agendamento->close();
                        }
                    }

                    // Envia os horários disponíveis para o JS
                    echo json_encode($horarios_disponiveis);
                }
            }

            // Fechar a declaração
            $stmt->close();
            //$sql_agendamento = "SELECT 1 FROM agendamento WHERE data = ? AND horario = ? AND id_barbearia = ? AND pendente = 1 LIMIT 1";
            break;
    }
}
