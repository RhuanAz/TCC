<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="container">
        <!-- Imagem dos profissionais de saúde -->
        <img src="./assets/img/barberConn.svg" alt="Logo">
        <!-- Formulário do login -->
        <form action="./backend/functionLogin.php" method="POST">
            <h1 class="titulo">LOGIN</h1>

            <?php
            if (isset($_SESSION['nao_autenticado'])) :
            ?>
                <!-- menssagem de email ou senha errados -->
                <p>ERRO: E-mail ou senha inválidos!</p>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>

            <div class="email">
                <label>E-mail:</label>
                <input type="text" placeholder="Informe seu e-mail" id="email" name="email" required>
            </div>
            <div class="senha">
                <label>Senha:</label>
                <input type="password" placeholder="Informe sua senha" id="senha" name="senha" required>
            </div>
            <!-- Botaão para realizar o login -->
            <button type="submit">Entrar</button>
            <div class="links">
                <!-- Botaão para ir para a página de cadastro -->
                <span>Não tem login?</span>
                <!-- Botaão para ir para a página de cadastro -->
                <a href="cadastro.php">Cadastre-se!</a>
            </div>
        </form>
    </div>
</body>

</html>