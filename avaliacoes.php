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

            <style>
                body {
                    background-color: white;
                }

                h1 {
                    color: black;
                }

                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }

                th,
                td {
                    padding: 15px;
                }

                #button {
                    background-color: red;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                }
            </style>
            <h1>Avaliações</h1>

            <div id="filter">
                <label for="rating">Nota:</label>
                <input type="number" id="rating" name="rating" min="1" max="5">
                <label for="start">De:</label>
                <input type="date" id="start" name="start">
                <label for="end">Até:</label>
                <input type="date" id="end" name="end">
                <button id="button">Filtrar</button>
            </div>

            <select name="sort" id="sort">
                <option value="">Ordenar</option>
                <option value="date">Data</option>
                <option value="rating">Nota</option>
            </select>

            <div id="reviews">
                <!-- Reviews will be dynamically inserted here -->
            </div>

            <script>
                // This is where you would add your JavaScript to make the page functional
                // For example, you could add an event listener to the "Filtrar" button that fetches data from a server and updates the "reviews" div
            </script>

            </head>

            <body>
                <div class="wrapper">
                    <?php
                    //INCLUSÃO DO MENU
                    include_once('menu.php');
                    ?>
                    <div id="content">


                    </div>
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