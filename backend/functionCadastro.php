<?php

require('conexao.php');

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$sexo = $_POST['sexo'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$rua = $_POST['rua_oculto'];
$num = $_POST['num'];
$bairro = $_POST['bairro_oculto'];
$cidade = $_POST['cidade_oculto'];
$uf = $_POST['uf_oculto'];

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$result = $conn->query("INSERT INTO cliente (nome, sobrenome, sexo, cpf, telefone, cep, rua, bairro, numero, cidade, uf, email, senha) 
VALUES ('$nome', '$sobrenome', '$sexo', '$cpf', '$telefone', '$cep', '$rua', '$bairro', '$num', '$cidade', '$uf', '$email', '$senha')");

if ($result) {
    header('Location: ../login.php');
}