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
        v
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

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                            </ul>
                        </div>
                    </div>
                </nav>
                    
                <br>
                <br>
                <label for="De:" class="de">De:</label>
                <input type="date">
                <br>
                <br>
                <label for="Para:">Para:</label>
                <input type="date" name="" id="" class="para">
                <br>
                <br>
                <input type="checkbox">
                <label for="">Apenas agendamentos de hoje.</label>
                <br><br>
                <button>Consultar</button>
                

                   <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
            </div>
        </div>
        <body>
          
        