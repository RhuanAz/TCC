<?php
require('conexao.php');

$id = $_SESSION['id'];

$sql = "SELECT * FROM cliente WHERE id_cliente = '$id' LIMIT 1";
$result = $conn->query($sql);
 