<?php
require('./backend/verificaLogin.php');
require('./backend/conexao.php');

//Buscar as barbearias para exibi-las no "barbearias.php"
$sql = "SELECT * FROM barbearia";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barbearias | Ouro Branco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/barbearias.css">
</head>

<body>

    <nav class="navbar navbar-expand-md bg-light">
        <div class="container-fluid nav-container">
            <a class="navbar-brand mb-0 h1" href="barbearias.php">Barber Connect</a>

            <!--Botão da navbar para telas pequenas-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link dropdown-toggle" id="user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style=" font-weight: bold !important;">
                        <i class="bi-person-circle" style="padding-right: 5% !important;"></i>
                        Olá, <?php echo $_SESSION['nome'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="minhaConta.php">
                                <i class="bi-pencil" style="padding-right: 7% !important"></i>
                                Minha Conta
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="agendaUser.php">
                                <i class="bi-calendar3" style="padding-right: 7% !important"></i>
                                Agendamentos
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="backend/logout.php">
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

    <div class="navsub alert alert-dismissible fade show" role="alert">
        <i class="bi bi-ticket-perforated" style="font-size: 30px; padding-right: 1%;"></i>
        Cupom de 5% para novos usuários!
        <button type="button" class="btn-close btn-close-white" style="padding-bottom: 11px;" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="content mt-3">
        <div class="images">
            <img src="assets/img/Barbers/carousel1.jpg" alt="" class="img-fluid">
            <img src="assets/img/Barbers/carousel2.jpg" alt="" class="img-fluid">
        </div>
        <!-- Restante do seu conteúdo -->


        <!--Botões dos filtros-->
        <div class="filtros">
            <div class="btnFiltros">
                <button class="btn btn-primary">Ordenar <i class="bi-chevron-down"></i></button>
                <button class="btn btn-primary">Distância <i class="bi-chevron-down"></i></button>
                <button class="btn btn-primary">Filtrar<i class="bi bi-filter"></i></button>
                <button class="btn btn-primary">Limpar</button>
            </div>
        </div>

        <div class="barbearias">
            <h3>Barbearias</h3>
            <div class="barber">
                <?php while ($dado = $result->fetch_array()) { ?>
                    <div class="barberItem col-md-4 col-sm-6" onclick="redirecionarPagina(<?php echo $dado['id_barbearia']; ?>, 'telaBarber.php')">
                        <img id="logo" src="<?php echo $dado['urlLogo']?>" width="70px" alt="">
                        <div class="barberText">
                            <span class="barberName"><?php echo $dado['nome_fantasia']; ?></span>
                            <div class="barberInfo">
                                <span class="avaliacao"><i class="bi bi-star-fill"></i> 5,0</span>
                                <span class="distancia">• 1,0 km </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/barbearias.js"></script>
</body>

</html>