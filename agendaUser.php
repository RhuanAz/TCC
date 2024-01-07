<?php
require('./backend/verificaLogin.php');
require('./backend/functionListAgenda.php')

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Agendamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/agendaUser.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
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
                            <a class="dropdown-item" id="account" href="#" disabled>
                                <i class="bi-pencil" style="padding-right: 7% !important"></i>
                                Minha Conta
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" id="agenda" href="#">
                                <i class="bi-calendar3" style="padding-right: 7% !important"></i>
                                Agendamentos
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" id="logout" href="backend/logout.php">
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
        <h3>Agendamentos</h3>
        <div class="divForm">
            <div class="divTable">
                <table class="table table-hover caption-top" id="myTable">
                    <caption>Próximos Agendamentos</caption>
                    <thead>
                        <tr>
                            <th scope="col" class="sortable" data-column="data" id="thData">Data</th>
                            <th scope="col" class="sortable" data-column="nome_fantasia"id="thBarber">Barbearia</th>
                            <th scope="col" class="sortable" data-column="nome_item" id="thItem">Item</th>
                            <th scope="col" class="sortable" data-column="valor" id="thValor">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . date('d/m/Y', strtotime($row['data'])) . '</td>';
                            echo '<td>' . $row['nome_fantasia'] . '</td>'; // Nome da barbearia
                            echo '<td>' . $row['nome_item'] . '</td>'; // Nome do item
                            echo '<td>R$ ' . number_format($row['valor'], 2, ',', '.') . '</td>';

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
        </div>
        </form>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/agendaUser.js"></script>
</body>

</html>