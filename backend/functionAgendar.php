<?php

require('conexao.php');

// Pega o ID da URL
$id_item = intval($_GET['id']);

// Recebe os dados JSON do corpo da requisição
$jsonData = file_get_contents('php://input');
$requestData = json_decode($jsonData, true);


print_r($requestData);
