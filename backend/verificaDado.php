<?php
require('conexao.php');
session_start();

$id = 0;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $metodo = $_POST['metodo'];
    $column = $_POST['column'];
    $tela = $_POST['tela'];

    // Verificar se o CPF já existe no BD.
    if ($metodo === "verifCPF") {
        $sql = "SELECT * FROM cliente WHERE (cpf = '" . $column . "')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row >= 1) {
            if ($tela === "minhaConta") {
                echo "false";
                return;
            }
            echo "true";
        } else {
            echo "false";
        }

    // Verificar se o email já existe no BD.
    } else if ($metodo === "verifEmail") {
        $sql = "SELECT * FROM cliente WHERE (email = '" . $column . "')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row >= 1) {
            if ($tela === "minhaConta") {
                echo "false";
                return;
            }
            echo "true";
        } else {
            echo "false";
        }

    // Verificar se o telefone já existe no BD.
    } else if ($metodo === "verifTelefone") {
        $sql = "SELECT * FROM cliente WHERE (telefone = '" . $column . "')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row >= 1) {
            if ($tela === "minhaConta") {
                echo "false";
                return;
            }
            echo "true";
        } else {
            echo "false";
        }
    }
}
