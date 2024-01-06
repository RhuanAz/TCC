<?php
require('conexao.php');
session_start();

// Pegar o valor do campo de texto do formulário
$nome_categoria = $_POST['categoria'];

// Inserir os dados no banco de dados (assumindo uma tabela chamada 'categoria')
$sql = "INSERT INTO categoria (nome_categoria) VALUES ('$nome_categoria')";

if ($conn->query($sql) === TRUE) {
?>
    <script>
        alert("Categoria inserida!");
        window.history.back();
    </script>
<?php
} else {
?>
    <script>
        alert("Categoria não inserida!");
        window.history.back();
    </script>
    <?php
}
    ?>