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

            <style>
                #botao1,
                #botao2 {
                    background-color: #D21742;
                    border: none;
                    color: white;
                    padding: 10px 20px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 10px;
                    cursor: pointer;
                    border-radius: 5px;

                    button:hover {
    cursor: pointer;
    background-color: #930828 !important;
    transition: 0.3s;
                }

                #botao1.disabled,
                #botao2.disabled {
                    background-color: gray;
                    /* Cor de fundo cinza para botões desativados */
                    cursor: not-allowed;
                    /* Cursor de não permitido quando desativado */
                }
            </style>


        </div>
    </div>

    <script>
        function selecionarBotao(botaoSelecionado) {
            if (botaoSelecionado === 1) {
                document.getElementById('botao1').classList.add('disabled');
                document.getElementById('botao2').classList.remove('disabled');
            } else if (botaoSelecionado === 2) {
                document.getElementById('botao2').classList.add('disabled');
                document.getElementById('botao1').classList.remove('disabled');
            }
        }
    </script>



</body>

</html>