<?php
require('./backend/verificaLogin.php');
require('./backend/functionBuscarBarber.php');
require('./backend/functionGetInfo.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $dados['nome_fantasia']; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/telaBarber.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light navbar-fixed">
        <div class="container-fluid nav-container">
            <a class="navbar-brand mb-0 h1" href="barbearias.php">Barber Connect</a>

            <!--Botão da navbar para telas pequenas-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">|</a>
                    </li>
                    <li class="nav-item dropdown d-flex">
                        <a class="nav-link active"><i class="bi-geo-alt-fill"></i> Ouro Branco - MG</a>
                    </li>

                </ul>


                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" id="user" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style=" font-weight: bold !important;">
                        <i class="bi-person-circle" style="padding-right: 5% !important;"></i>
                        Olá, Rhuan
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi-pencil" style="padding-right: 7% !important"></i>
                                Minha Conta
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi-calendar3" style="padding-right: 7% !important"></i>
                                Agendamentos
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi-box-arrow-right" style="padding-right: 7% !important"></i>
                                Sair
                            </a>
                        </li>
                    </ul>
                </li>
                </form>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="coverImg">
            <img class="cover" src="assets/img/TelaBarbers/imgCover.jpg" alt="">
        </div>
        <div class="barberInfo">
            <img src="<?php echo $infos_barbearia['urlLogo']; ?>" width="74px" style="border-radius: 6px;" alt="">
            <div class="barberText">
                <span class="infos">
                    <span class="barberName">
                        <?php echo $dados['nome_fantasia']; ?>
                    </span>
                    <span class="sideInfo">
                        <span class="avaliacao"><i class="bi bi-star-fill"></i> 5,0</span>
                        <span class="distancia">• 2,0 km </span>
                    </span>
                    <span class="rightInfo">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#horarioModal">
                            Horário de funcionamento
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="horarioModal" tabindex="-1" aria-labelledby="horarioModal"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 position-relative" id="horarioModalLabel">Horário de
                                            funcionamento</h1>
                                        <button type="button" class="btn-close" style="color: red !important;"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <?php
                                        $dias_da_semana = array(
                                            'domingo' => 'Domingo',
                                            'segunda' => 'Segunda-feira',
                                            'terca'   => 'Terça-feira',
                                            'quarta'  => 'Quarta-feira',
                                            'quinta'  => 'Quinta-feira',
                                            'sexta'   => 'Sexta-feira',
                                            'sabado'  => 'Sábado'
                                        );

                                        foreach ($dias_da_semana as $dia_em_ingles => $dia_em_portugues)
                                        {
                                            $horario_do_dia = $horarios[$dia_em_ingles];
                                            echo "<p style='margin-bottom: 10px;'><strong>{$dia_em_portugues}</strong>: {$horario_do_dia}</p>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#infoModal">
                            Informações
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 position-relative" id="infoModal">Informações do
                                            estabelecimento</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <?php echo $infos_barbearia['rua'] . ', ' . $infos_barbearia['numero'] . ', ' . $infos_barbearia['bairro'] . '. ' . $infos_barbearia['cidade'] . ' - ' . $infos_barbearia['uf']; ?>
                                        <br><br>
                                        <strong>Email:</strong>
                                        <?php echo $infos_barbearia['email']; ?>
                                        <br><br>
                                        <strong>Telefone:</strong>
                                        <?php echo $infos_barbearia['telefone']; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
            <?php
            // Consulta das categorias dos itens de uma barbearia
            $sql = "SELECT * FROM categoria WHERE id_barbearia = '" . $id_barbearia . "' ORDER BY nome_categoria";
            $resultCategoria = $conn->query($sql);

            // Verificar se há categorias
            if ($resultCategoria->num_rows > 0)
            {
                // Iterar sobre as categorias
                while ($categoria = $resultCategoria->fetch_array())
                {
                    echo '<h3>' . $categoria['nome_categoria'] . '</h3>';

                    // Consulta dos cortes/itens da barbearia para a categoria atual
                    $sql_itens_categoria = "SELECT * FROM item WHERE id_barbearia = '" . $id_barbearia . "' AND id_categoria = '" . $categoria['id_categoria'] . "' ORDER BY valor";
                    $resultItem = $conn->query($sql_itens_categoria);

                    // Verificar se há itens na categoria
                    if ($resultItem->num_rows > 0)
                    {
                        // Iterar sobre os itens da categoria atual
                        while ($item = $resultItem->fetch_array())
                        {
                            echo '<div class="barberItem" onclick="redirecionarPagina(' . $item['id_item'] . ', \'telaFinalizar.php\')">';
                            echo '<span class="itemName">' . $item['nome_item'] . '</span>';
                            echo '<div class="description">';
                            echo '<span class="itemDescription">' . $item['descricao'] . '</span>';
                            echo '<span class="price">R$ ' . $item['valor'] . '</span>';
                            echo '</div>';
                            echo '<div class="minImg">';
                            echo '<img src="' . $item['urlCorte'] . '" width="150px" height="163px" alt="" style="border-radius: 6px;">';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    else
                    {
                        echo '<p>Não há itens cadastrados nesta categoria.</p>';
                    }
                }
            }
            else
            {
                echo '<p>Não foram cadastrados itens ainda.</p>';
            }
            ?>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/barbearias.js"></script>
</body>

</html>