<?php
session_start();
require('conexao.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../login.php');
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$sql = "SELECT * FROM cliente WHERE email = '$email' LIMIT 1";
$sql_exec = $conn->query($sql);

$usuario = $sql_exec->fetch_assoc();

if (password_verify($senha, $usuario['senha'])) {
    //Login bem-sucedido
    $_SESSION['email'] = $email;
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['id'] = $usuario['id_cliente'];
    header('Location: ../barbearias.php');
    exit();
} else {
    //Login mal-sucedido
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login.php');
    exit();
}
