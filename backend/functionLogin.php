<?php
session_start();
require('conexao.php');

/*if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $cliente = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_cliente'] = $cliente['id_cliente'];
            $_SESSION['nome'] = $cliente['nome'];

            header("Location: telaBarber.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

} */

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
    die("Falha na preparação da consulta: " . $conn->error);
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

