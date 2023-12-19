<?php
require('conexao.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $metodo = $_POST['metodo'];
    $column = $_POST['column'];
    $tela = $_POST['tela'];
    $table = $_POST['table'];

    $sql = "SELECT * FROM $table WHERE (" . $metodo . " = '" . $column . "')";

    if ($tela === "minhaConta") {
        $id_user = $_SESSION['id'];
        $sql .= " AND id_cliente != " . $id_user;
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);

    if ($row >= 1) {
        echo "true";
    } else {
        echo "false";
    }
}

