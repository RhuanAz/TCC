<?php
include_once('conexao.php');

$id = $_SESSION['id_barber'];

$sql = "SELECT * FROM barbearia WHERE id_barbearia = '$id' LIMIT 1";
$result = $conn->query($sql);
 