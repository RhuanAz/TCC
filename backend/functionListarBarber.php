<?php
require('conexao.php');

//Listar Barbearias no "barbearias.php"
$sql = "SELECT * FROM barbearia";
$result = $conn->query($sql);
 