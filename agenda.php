<?php
require('./backend/verificaLogin.php');
require('./backend/listAgendamento.php')

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Agenda / Portal do Parceiro</title>

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

        <!-- Page Content Holder -->
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
                <h2>Agenda</h2>
                <p>Aqui você pode ver os agendamentos feitos no seu estabelecimento.</p>
                <div class="line"></div>
                <p id="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod eaque rerum excepturi alias, quia saepe perferendis consequatur rem? Labore corrupti maiores quas reiciendis deleniti. Similique architecto dolor assumenda odio dolores! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas labore dolorem architecto. Maiores, quo similique modi totam nostrum voluptatem, quasi doloribus aut expedita possimus ab officiis fuga odit. Repellat, quasi.</p>


                <div class="divTable">
                    <table class="table table-hover caption-top" id="myTable">
                        <caption>Agendamentos</caption>
                        <thead>
                            <tr>
                                <th scope="col" class="sortable" data-column="data" id="thData">Data</th>
                                <th scope="col" class="sortable" data-column="data" id="thData">Horário</th>
                                <th scope="col" class="sortable" data-column="nome_item" id="thItem">Item</th>
                                <th scope="col" class="sortable" data-column="valor" id="thValor">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . date('d/m/Y', strtotime($row['data'])) . '</td>';
                                echo '<td>' . substr($row['horario'], 0, 5) . '</td>';
                                echo '<td>' . $row['nome_item'] . '</td>'; // Nome do item
                                echo '<td>R$ ' . number_format($row['valor_item'], 2, ',', '.') . '</td>';

                                // Você pode adicionar mais colunas conforme necessário

                                echo '</tr>';
                            }

                            // Fechar a tabela HTML
                            echo '</tbody>';
                            echo '</table>';
                            echo '</div>';

                            // Verificar se há resultados
                            if ($result->num_rows === 0) {
                                echo 'Nenhum agendamento encontrado.';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/agenda.js"></script>


    <body>