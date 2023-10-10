<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Barra de tarefas</title>
        
        
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        
        <link rel="stylesheet" href="../TCC/assets/css/style4.css">
        
        
    </head>
    <body>
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
                    
                </div>
            </div>
            
            

    
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
        </body>
    </html>
    
<body>
    
