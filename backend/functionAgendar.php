<?php
session_start();
require('conexao.php');

// Pega o ID da URL
$id_item = intval($_GET['id']);
// Pega o ID do cliente na SESSION
$id_cliente = $_SESSION['id'];

$sql = "SELECT id_barbearia FROM item WHERE id_item = $id_item";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id_barbearia = $row['id_barbearia'];

$jsonData = file_get_contents('php://input');
$requestData = json_decode($jsonData, true);

// Verifica se os dados foram recebidos corretamente
if ($requestData !== null && isset($requestData['data']) && isset($requestData['horario'])) {
    $data = $requestData['data'];
    $horario = $requestData['horario'];

    $data = DateTime::createFromFormat('d/m/Y', $data)->format('Y-m-d');
    // Convertendo a string de horário para o formato do MySQL
    $horario = DateTime::createFromFormat('H:i', $horario)->format('H:i');

    $sql = "INSERT INTO `agendamento` (`data`, `horario`, `id_barbearia`, `id_cliente`, `id_item`, `pendente`) 
            VALUES ('$data', '$horario', $id_barbearia, $id_cliente, $id_item, 1)";
    $result = mysqli_query($conn, $sql);


    print_r($requestData);
    // Restante do código...
} else {
    // Caso os dados não estejam presentes ou sejam inválidos
    echo "Dados inválidos ou ausentes.";
}
