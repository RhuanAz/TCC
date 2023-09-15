<?php

define('HOST', 'localhost:3307');
//define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'barberconnect');

$conn = new mysqli(HOST, USER, PASSWORD, DB);

if ($conn->connect_error) {
    die("Falha na conexão com o BD: " . $conn->connect_error);
}