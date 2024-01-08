<?php
session_start();
require('./backend/verificaLogin.php');
require('./backend/functionBuscarBarber.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Minha loja / Portal do Parceiro</title>

    <!-- Bootstrap CSS CDN -->
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

        <div id="content" style="border: 1px solid;">

            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <span class="material-symbols-outlined">
                            menu
                        </span>
                    </button>
                </div>
            </div>

            <h2>Minha loja</h2>
            <p>Aqui você pode ver uma preview da sua loja no site.</p>

            <div class="line"></div>
            <div class="content">
                <div class="coverImg">
                    <img class="cover" src="assets/img/TelaBarbers/imgCover.jpg" alt="">
                </div>
                <div class="barberInfo">
                    <img src="assets/img/Barbers/barberLogo.jpg" alt="">
                    <div class="barberText">
                        <span class="infos">
                            <span class="barberName">
                                <?php echo $dados['nome_fantasia']; ?>
                            </span>
                            <span class="rightInfo">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#horarioModal">
                                    Informações
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="horarioModal" tabindex="-1" aria-labelledby="horarioModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 position-relative" id="horarioModalLabel">Horário de funcionamento</h1>
                                                <button type="button" class="btn-close" style="color: red !important;" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                Domingo: Fechado <br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infoModal">
                                    Horário de Funcionamento
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 position-relative" id="infoModal">Horário de funcionamento</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                TESTE <br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                                Segunda-feira: 07h00<br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="filtros">
                    <div class="btnFiltros">
                        <button class="btn btn-primary">Ordenar <i class="bi-chevron-down"></i></button>
                        <button class="btn btn-primary">Filtrar<i class="bi bi-filter"></i></button>
                    </div>
                </div>

                <p id="lorem">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas labore dolorem architecto. Maiores, quo similique modi totam nostrum voluptatem, quasi doloribus aut expedita possimus ab officiis fuga odit. Repellat, quasi.</p>

                <!--Buscar os cortes da barbearia-->
                <?php
                //Consulta dos cortes/itens da barbearia    
                $sql = "SELECT * FROM item WHERE id_barbearia = '" . $id_barbearia . "' ORDER BY valor";
                $resultItem = $conn->query($sql);

                //Consulta das categorias dos itens de uma barbearia
                $sql = "SELECT * FROM categoria WHERE id_barbearia = '" . $id_barbearia . "' ORDER BY nome_categoria";
                $resultCategoria = $conn->query($sql);
                ?>

                <div class="minBarber">
                    <?php while ($categoria = $resultCategoria->fetch_array()) { ?>
                        <h3>
                            <?php echo $categoria['nome_categoria']; ?>
                        </h3>

                        <?php
                        // Executar a consulta SQL para obter os itens desta categoria
                        $sqlItem = "SELECT * FROM item WHERE id_categoria = " . $categoria['id_categoria'];
                        $resultItem = $conn->query($sqlItem);

                        // Verificar se há itens nesta categoria
                        if ($resultItem->num_rows > 0) {
                            while ($item = $resultItem->fetch_array()) {
                        ?>
                                <div class="barberItem" onclick="redirecionarPagina(<?php echo $item['id_item']; ?>, 'telaFinalizar.php')">
                                    <span class="itemName">
                                        <?php echo $item['nome_item']; ?>
                                    </span>
                                    <div class="description">
                                        <span class="itemDescription">
                                            <?php echo $item['descricao']; ?>
                                        </span>
                                        <span class="price">R$
                                            <?php echo $item['valor']; ?>
                                        </span>
                                        <img src="/" alt="">
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            // Se não houver itens nesta categoria, exibir mensagem
                            echo "<p>Não há itens cadastrados para esta categoria.</p>";
                        }
                        ?>
                    <?php } ?>
                </div>


            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>