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
   
    <link rel="stylesheet" href=".//assets/css/style4.css" />

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
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
            </div>
            </nav>

            <h2>Minha loja</h2>
            <p>Aqui você pode ver uma preview da sua loja no site.</p>

            <div class="line"></div>

            
            <h2>Zappelin BarberShop</h2>
            <img src="../assets/img/zappelin.jpg" alt="" class="img">
            <p>Bem-vindo à "Zappelin BarberShop" a sua barbearia de referência para cuidados com a aparência masculina na cidade! Aqui, não estamos apenas no
                negócio de cortar cabelos; estamos comprometidos em proporcionar uma experiência completa de transformação e rejuvenescimento para nossos clientes.
                Com uma equipe apaixonada de barbeiros talentosos e um ambiente acolhedor, estamos aqui para tornar cada visita inesquecível.</p>

            <div class="line"></div>

            <h2>Cortes de cabelo</h2>

            <p>Item</p>
            <img src="../TCC/assets/img/corte.webp" alt="" class="img">

            <p>Preço: R$25,00</p>

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Disponibilidade</label>
            </div>
            <div class="line"></div>
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