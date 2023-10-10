<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../TCC/assets/css/style4.css">
        
</head>
<body>
    <?php
            //INCLUSÃO DO MENU
            include_once('menu.php');
            ?>

            

    <button id="botao1" onclick="selecionarBotao(1)">Aberto</button>
    <button id="botao2" onclick="selecionarBotao(2)">Fechado</button>

    <script>
        function selecionarBotao(botaoSelecionado) {
            // Desativa o botão que foi clicado
            document.getElementById('botao' + botaoSelecionado).disabled = true;

            // Ativa o outro botão
            var outroBotao = botaoSelecionado === 1 ? 2 : 1;
            document.getElementById('botao' + outroBotao).disabled = false;
        }
    </script>
</body>

</html>

</body>
</html>