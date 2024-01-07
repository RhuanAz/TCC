<?php
session_start();
require('conexao.php');

if (empty($_POST['inputEmail']) || empty($_POST['inputSenha'])) {
    header('Location: ../loginparceiro.php');
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['inputEmail']);
$senha = $_POST['inputSenha']; // Não escape a senha aqui

$sql = "SELECT * FROM barbearia WHERE email = '$email' LIMIT 1";
$sql_exec = $conn->query($sql);

$usuario = $sql_exec->fetch_assoc();

if (password_verify($senha, $usuario['senha'])) {
    //Login bem-sucedido
    $_SESSION['email'] = $email;
    $_SESSION['nome'] = $usuario['nome_fantasia'];
    $_SESSION['id_barber'] = $usuario['id_barbearia'];
    header('Location: ../index4.php');
    exit();
} else {
    //Login mal-sucedido
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../loginparceiro.php');
    exit();
}


/* Pegar o valor do campo de texto do formulário
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

        ?>*/