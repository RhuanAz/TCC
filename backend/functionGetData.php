<?php

require('conexao.php');

// Obtenha o valor do parâmetro da solicitação AJAX
$id_item = intval($_GET['id']);

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
        INNER JOIN item i ON h.id_barbearia = i.id_barbearia
        WHERE i.id_item = ?";

// Prepare e execute a consulta com o parâmetro
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_item);
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
