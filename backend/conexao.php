<?php

define('HOST', 'localhost:3307');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'barberconnect');

$conn = new mysqli(HOST, USER, PASSWORD, DB);

if ($conn->connect_error) {
    die("Falha na conexão com o BD: " . $conn->connect_error);
}else{
    echo("conexao sucedida");
}