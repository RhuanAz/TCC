<?php
require('conexao.php');

$email = $_SESSION['email'];

$sql = "SELECT * FROM cliente WHERE email = '$email' LIMIT 1";
$sql_exec = $conn->query($sql);

$usuario = $sql_exec->fetch_assoc();

