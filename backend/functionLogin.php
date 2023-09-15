<?php
session_start();
require('conexao.php');


if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../login.php');
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$sql = "SELECT * FROM cliente WHERE (email = '".$email ."') LIMIT 1";
$sql_exec = $conn->query($sql);

$usuario = $sql_exec->fetch_assoc();

if(password_verify($senha, $usuario['senha'])){
    echo "Usuário Logado";
    $_SESSION['email'] = $email;
    header('Location: ../list.php');
    exit();
}else{
    echo "Falha ao logar";
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login.php');
    exit();
}

/*
$result = mysqli_query($conection, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: ../list.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login.php');
    exit();
}



$row = mysqli_num_rows($result);


if ($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: ../list.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../login.php');
    exit();
}*/
