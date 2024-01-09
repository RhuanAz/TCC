<?php
include_once('conexao.php');

$id_barbearia = intval($_GET['id']);

$sql = "SELECT * FROM barbearia WHERE id_barbearia = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_barbearia);
$stmt->execute();
$infos_barbearia = $stmt->get_result()->fetch_assoc();

// Seleciona informações da tabela 'horario'
$sql_horario = "SELECT * FROM horario WHERE id_barbearia = ?";
$stmt_horario = $conn->prepare($sql_horario);
$stmt_horario->bind_param("i", $id_barbearia);
$stmt_horario->execute();
$infos_horarios = $stmt_horario->get_result()->fetch_all(MYSQLI_ASSOC);

// Agora você tem um array associativo com os horários para cada dia
// Exemplo de como acessar os horários:
$horarios = array();
foreach ($infos_horarios as $info_horario) {
    foreach ($info_horario as $dia => $horario) {
        if ($dia != 'id' && $dia != 'intervalo' && $dia != 'aberto' && $dia != 'id_barbearia') {
            $horarios[$dia] = $horario ? $horario : 'Fechado';
        }
    }
}



?>