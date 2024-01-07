<?php

require('conexao.php');

// Pega o ID do cliente na SESSION
$id_cliente = $_SESSION['id'];

// Obtém a data e hora atual no formato do banco de dados
$data_hora_atual = date('Y-m-d H:i:s');

$sql = "SELECT agendamento.*, item.valor, item.nome_item AS nome_item, barbearia.nome_fantasia AS nome_fantasia
        FROM agendamento
        JOIN item ON agendamento.id_item = item.id_item
        JOIN barbearia ON agendamento.id_barbearia = barbearia.id_barbearia
        WHERE agendamento.id_cliente = ? AND CONCAT(agendamento.data, ' ', agendamento.horario) > ?
        ORDER BY CONCAT(agendamento.data, ' ', agendamento.horario) DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $id_cliente, $data_hora_atual);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();

?>
