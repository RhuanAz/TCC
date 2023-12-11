<?php
require('conexao.php');
session_start();

$id = $_SESSION['id'];

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
$senha = $_POST['senha_oculto'];

$sql = "UPDATE cliente SET 
    nome = '$nome',
    sobrenome = '$sobrenome',
    sexo = '$sexo',
    cpf = '$cpf',
    telefone = '$telefone',
    cep = '$cep',
    rua = '$rua',
    numero = '$num',
    bairro = '$bairro',
    cidade = '$cidade',
    uf = '$uf'";

// Adicionar a senha à consulta se não estiver vazia
if (!empty($senha)) {
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $sql .= ", senha = '$senha'";
}

$sql .= " WHERE id_cliente = $id";

$result = $conn->query($sql);

if ($result) {
    header('Location: ../minhaConta.php');
}
