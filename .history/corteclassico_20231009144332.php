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
            <button class="categoria">+ Adicionar categoria</button>






            <button id="botaoAbrir">Adicionar categoria</button>
            <div id="caixaTexto" style="display: none;">
                <input type="text" id="textoInput" placeholder="Digite seu texto aqui">
                <button onclick="salvarTexto()">Salvar</button>
            </div>
            <div id="textoSalvo"></div>
            <script>
                document.getElementById('botaoAbrir').addEventListener('click', function() {
                    document.getElementById('caixaTexto').style.display = 'block';
                });

                function salvarTexto() {
                    var texto = document.getElementById('textoInput').value;
                    document.getElementById('textoSalvo').textContent = texto;
                    document.getElementById('textoInput').value = '';
                }
            </script>







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