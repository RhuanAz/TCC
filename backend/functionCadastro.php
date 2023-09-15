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

$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);



?>

