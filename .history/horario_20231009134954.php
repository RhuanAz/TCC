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
    <style>


    </style>

</head>

<body>
    <div class="wrapper">
        <?php
        //INCLUSÃO DO MENU
        include_once('menu.php');
        ?>
        <div id="content">

            <h1>Horário de Funcionamento</h1>
            <p>Escolha os horários que o seu estabelecimento estará aberto.</p>
            <br>

            <button id="botao1" onclick="selecionarBotao(1)">Aberto</button>

            <button id="botao2" onclick="selecionarBotao(2)">Fechado</button>

            

        </div>
    </div>

    <script>
        function selecionarBotao(botaoSelecionado) {
            // Desativa o botão que foi clicado
            document.getElementById('botao' + botaoSelecionado).disabled = true;

            // Ativa o outro botão
            var outroBotao = botaoSelecionado === 1 ? 2 : 1;
            document.getElementById('botao' + outroBotao).disabled = false;
        }
    </script>


<style>
                #botao1, #botao2 {
    background-color: #4CAF50; /* Cor de fundo verde */
    border: none; /* Remove a borda */
    color: white; /* Cor do texto branco */
    padding: 10px 20px; /* Espaçamento interno do botão */
    text-align: center; /* Alinhamento do texto ao centro */
    text-decoration: none; /* Remove sublinhado do texto */
    display: inline-block; /* Faz com que os botões fiquem na mesma linha */
    font-size: 16px; /* Tamanho da fonte */
    margin: 10px; /* Espaçamento externo do botão */
    cursor: pointer; /* Muda o cursor para uma mão quando hover */
    border-radius: 5px; /* Borda arredondada */
}

#botao1:hover, #botao2:hover {
    background-color: #45a049; /* Cor de fundo verde mais escura no hover */
}

            </style>

</body>

</html>