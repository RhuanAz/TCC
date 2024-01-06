<?php
require('./backend/conexao.php');

//Buscar as barbearias para exibi-las no horario tabela 
$sql = "SELECT * FROM horario";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-br">

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
                }

                #botao1.disabled,
                #botao2.disabled {
                    background-color: gray;
                    /* Cor de fundo cinza para botões desativados */
                    cursor: not-allowed;
                    /* Cursor de não permitido quando desativado */
                }
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
                        <br>
                        <br><br><br>



                        <!--Div teste horário-->
                        <div>
                            <form action="./backend/functionHorario.php" method="post">

                                <h4>Segunda-feira</h4>
                                <label for="appt">Horário:</label>
                                <input type="time" id="appt" name="segmanhainicio"> a <input type="time" id="appt" name="segmanhafim">

                                  <label for="html">Vai abrir?</label><br>

                                <h4>Terça-feira</h4>
                                <label for="appt">Horário:</label>
                                <input type="time" id="appt" name="termanhainicio"> a <input type="time" id="appt" name="termanhafim">


                                <h4>Quarta-feira</h4>
                                <label for="appt">Horário:</label>
                                <input type="time" id="appt" name="quamanhainicio"> a <input type="time" id="appt" name="quamanhafim">


                                <h4>Quinta-feira</h4>
                                <label for="appt">Horário:</label>
                                <input type="time" id="appt" name="quimanhainicio"> a <input type="time" id="appt" name="quimanhafim">


                                <h4>Sexta-feira</h4>
                                <label for="appt">Horário:</label>
                                <input type="time" id="appt" name="sexmanhainicio"> a <input type="time" id="appt" name="sexmanhafim">


                                <h4>Sábado-feira</h4>
                                <label for="appt">Horário:</label>
                                <input type="time" id="appt" name="sabmanhainicio"> a <input type="time" id="appt" name="sabmanhafim">


                                <h4>Domingo</h4>
                                <label for="appt">Horário:</label>
                                <input type="time" id="appt" name="dommanhainicio"> a <input type="time" id="appt" name="dommanhafim">

                                  <label for="html">Vai abrir?</label><br>

                                <input type="submit" value="Enviar horário"> <input type="radio" id="html" name="fav_language" value="HTML">

                            </form>

                        </div>
                        <br><br><br><br><br><br>
                        <?php

                        // Supondo que a conexão já foi estabelecida e armazenada na variável $conn

                        $sql = "SELECT id, dia_da_semana, manha, tarde, noite FROM horario"; // Substitua por sua consulta SQL
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table><tr><th>ID</th><th>Dia da Semana</th></tr><th>Manhã</th><th>Tarde</th><th>Noite</th>";

                            // Saída de cada linha

                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $row["domingo"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["segunda"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["terca"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["quarta"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["quinta"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["sexta"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["sabado"] ?>
                                    </td>
                                    <td><a href="editarHorario.php?id=<?php echo $row['id'] ?>">Editar</a></td>
                                </tr>

                        <?php
                            }
                            echo "</table>";
                        } else {
                            echo "0 resultados";
                        }
                        ?>

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