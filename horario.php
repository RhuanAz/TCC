<?php
require('./backend/conexao.php');
include_once('backend/conexao.php');

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Horários / Portal do Parceiro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

        <div class="wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <span class="material-symbols-outlined">
                                menu
                            </span>
                        </button>
                    </div>
                </div>

                <div class="content">
                    <h2>Horário de Funcionamento</h2>
                    <p>Escolha os horários que o seu estabelecimento estará aberto.</p>
                    <p id="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod eaque rerum excepturi alias, quia saepe perferendis consequatur rem? Labore corrupti maiores quas reiciendis deleniti. Similique architecto dolor assumenda odio dolores! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas labore dolorem architecto. Maiores, quo similique modi totam nostrum voluptatem, quasi doloribus aut expedita possimus ab officiis fuga odit. Repellat, quasi.</p>

                    <div class="line"></div>


                    <!--Div teste horário-->
                    <div>
                        <form action="testehorario.php" method="post">

                            <div class="linha">
                                <h4>Domingo</h4>
                                <label for="appt">Manhã:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">
                            </div>

                            <div class="linha">
                                <h4>Segunda-feira</h4>
                                <label for="appt">Manhã:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">
                            </div>

                            <div class="linha">
                                <h4>Terça-feira</h4>
                                <label for="appt">Manhã:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">
                            </div>

                            <div class="linha">
                                <h4>Quarta-feira</h4>
                                <label for="appt">Manhã:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">
                            </div>

                            <div class="linha">
                                <h4>Quinta-feira</h4>
                                <label for="appt">Manhã:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">
                            </div>

                            <div class="linha">
                                <h4>Sexta-feira</h4>
                                <label for="appt">Manhã:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">
                            </div>

                            <div class="linha">
                                <h4>Sábado</h4>
                                <label for="appt">Manhã:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">
                            </div>

                            <div class="linha">
                                <h4>Domingo</h4>
                                <label for="appt">Manhã:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">
                            </div>
                            <button type="submit" id="btn-cadastrar" class="btn btn-primary btn-lg meu-botao">Cadastrar</button>
                        </form>

                    </div>
                </div>


            </div>
            <div class="line"></div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>