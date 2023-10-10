<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Barra de tarefas</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../TCC/assets/css/style4.css">

</head>

<body>
    <div class="wrapper">
        <?php
        //INCLUSÃO DO MENU
        include_once('menu.php');
        ?>
        <!-- Page Content Holder -->
        <div id="content">


            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>

                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                </div>
            </div>
            </nav>
            <br><br>


            <button onclick="abrirPopup()">Abrir Pop-up</button>
            <script> function abrirPopup() {
    // Cria uma nova janela pop-up
    var popup = window.open('', '_blank', 'width=300,height=200');

    // Conteúdo HTML para a pop-up (um campo de texto e um botão)
    var popupContent = `
        <div>
            <input type="text" id="textoInput" placeholder="Digite seu texto aqui">
            <button onclick="salvarTexto()">Salvar</button>
        </div>
        <div id="textoSalvo"></div>
    `;

    // Define o conteúdo da pop-up
    popup.document.body.innerHTML = popupContent;
}

function salvarTexto() {
    // Obtém o valor do campo de texto na pop-up
    var texto = window.opener.document.getElementById('textoInput').value;

    // Exibe o texto na pop-up
    var textoSalvoDiv = window.document.getElementById('textoSalvo');
    textoSalvoDiv.textContent = 'Texto Salvo: ' + texto;
}

</script>
            <style>
                #botaoAbrir,
                #salvarTexto {
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
                }
            </style>






            <h1>Corte clássico</h1>
            <p>Imagem:</p>
            <img src="../TCC/assets/img/classiccorte.webp" alt="" class="img">
            <style>
                .img {
                    width: 300px;
                    height: auto;
                }
            </style>
            <h3>Preço: R$30,00</h3>

        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>