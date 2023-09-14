<?php
require('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $metodo = $_POST['metodo'];
    $column = $_POST['column'];

    if ($metodo === "verifCPF") {
        // Verificar se o CPF já existe no BD.
        $sql = "SELECT * FROM cliente WHERE (cpf = '".$column ."')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row >= 1) {
            echo "CPF indisponível";
        }

    }else if ($metodo === "verifEmail") {
        // Verificar se o email já existe no BD.
        $sql = "SELECT * FROM cliente WHERE (email = '".$column ."')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row >= 1) {
            echo"true";
        }

    }else if ($metodo === "verifTelefone") {
        // Verificar se o telefone já existe no BD.
        $sql = "SELECT * FROM cliente WHERE (telefone = '".$column ."')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row >= 1) {
            echo "Telefone indisponível";
        }
    }
}
?>