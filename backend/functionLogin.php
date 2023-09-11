<?php
session_start();
require('conexao.php');


if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../login.php');
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$sql = "SELECT * FROM cliente WHERE (email = ?) AND (senha = ?)";

$stmt = $conn->prepare($sql);

if ($stmt) {
    // Vincule os valores dos parâmetros ("ss" = String/String)
    $stmt->bind_param("ss", $email, $senha);
    // Execute a consulta
    $stmt->execute();
    // Obtenha o resultado da consulta
    $stmt->store_result();
    // Verifique o número de linhas retornadas
    $row = $stmt->num_rows;

    // Feche a declaração
    $stmt->close();
} else {
    die("Falha na preparação da consulta: ");
}

if ($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: ../list.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login.php');
    exit();
}
