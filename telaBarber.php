<?php
require('./backend/verificaLogin.php');
require('./backend/functionBuscarBarber.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeppelin Barber Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/telaBarber.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid nav-container">
            <a class="navbar-brand mb-0 h1" href="#">Barber Connect</a>

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
            <img src="assets/img/Barbers/barberLogo.jpg" alt="">
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
                        <span><a href="">Informações</a></span>
                        <span><button class="btn btn-primary">Aberto<i class="bi-chevron-down"></i></button></span>
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
        //Consulta dos cortes da barbearia    
        $sql = "SELECT * FROM item WHERE id_barbearia = '" . $id_barbearia . "'";
        $resultItem = $conn->query($sql);

        //Consulta das categorias dos itens de uma barbearia
        $sql = "SELECT * FROM categoria WHERE id_barbearia = '" . $id_barbearia . "' ORDER BY nome_categoria";
        $resultCategoria = $conn->query($sql);
        ?>

        <div class="minBarber">
            <?php while ($categoria = $resultCategoria->fetch_array()){ ?>
                <h3><?php echo $categoria['nome_categoria'];?></h3>
                <?php while ($item = $resultItem->fetch_array()){ ?>
                <div class="barberItem" onclick="redirecionarPagina('')">
                    <span class="itemName">Corte Estudante</span>
                    <div class="description">
                        <span class="itemDescription">Corte simples com degradê.</span>
                        <span class="price">R$ 20,00</span>
                        <img src="" alt="">
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/barbearias.js"></script>
</body>

</html>