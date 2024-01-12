<?php
require('./backend/verificaLogin.php');
require('./backend/conexao.php');
require('./backend/functionFinalizar.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Agendamento</title>
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/telaFinalizar.css">
</head>

<body>
    <div class="content">
        <div class="parent">
            <a href="barbearias.php">
                <img src="assets/img/barberConn.svg" style="width: 170px;" alt="">
            </a>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-white pt-3 px-md-4 px-2">
            <div class="">
                <h2>Finalizar Agendamento</h2>
            </div>
        </nav>
        <div class="row px-md-4 px-2 pt-4">
            <div class="col-lg-8">
                <p class="pb-2 fw-bold">Endereço</p>
                <div class="adress b-bottom">
                    <div class="adress_street">
                        <span><?php echo $item['rua'] . ', ' . $item['numero']; ?></span>
                    </div>
                    <span class="adress_others"><?php echo $item['bairro'] . ' - ' . $item['cidade'] . '/', $item['uf']; ?></span>
                </div>
                <p class="pb-2 pt-2 fw-bold">Pedido</p>
                <div class="card">
                    <div>
                        <div class="table-responsive px-md-4 px-2 pt-3">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <img class="pic" src="<?php echo $item['urlCorte']; ?>" alt="">
                                                </div>
                                                <div class="ps-3 d-flex flex-column justify-content">
                                                    <p class="fw-bold"><?php echo $item['nome_item']; ?></p>
                                                    <span class="pt-2 text-muted"><?php echo $item['nome_categoria']; ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="pe-3"><span class="red preco" id="preco">R$ <?php echo $item['valor']; ?></span></p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 delivery">
                        <p class="pt-4 fw-bold">Data</p>
                        <div class="d-md-flex justify-content-between align-items-center mt-4 pb-4">
                            <input id="datetime" name="data" class="card" type="text" placeholder="Selecione uma data">
                        </div>
                    </div>
                    <div class="col-lg-6 delivery">
                        <p class="pt-4 fw-bold">Horário</p>
                        <div class="d-md-flex justify-content-between align-items-center mt-4 pb-4">
                            <select class="card" id="selectHorario" name="selectHorario">
                                <option value="" disabled selected>Selecione o horário</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="payment-summary">
                    <p class="fw-bold pt-lg-0 pt-4 pb-2">Resumo do pagamento</p>
                    <div class="card px-md-3 px-2 pt-4">

                        <div class="d-flex flex-column b-bottom">
                            <span style="color: gray;">Seu agendamento em</span>
                            <a href="telaBarber.php?id=<?php echo $item['id_barbearia']; ?>"><?php echo $item['nome_fantasia']; ?></a>
                        </div>

                        <div class="pt-3">
                            <div class="unregistered mb-4">
                                <span class="py-1">cupom de desconto</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column b-bottom">
                            <div class="d-flex justify-content-between">
                                <input type="text" class="form-control ps-2" id="codigoCupom" placeholder="Digite o código do cupom">
                                <div class="btn btn-primary" id="btnAplicar" onclick="aplicarCupom()">
                                    APLICAR
                                </div>
                            </div>
                            <span id="mensagemErro" class="text-danger">Cupom Inválido</span>
                            <span id="cupomAplicado" class="text">Cupom Aplicado!</span>
                        </div>

                        <div class="d-flex flex-column b-bottom">
                            <div class="d-flex justify-content-between py-3">
                                <small class="text-muted">
                                    Valor do Pedido
                                </small>
                                <p class=preco>R$ <?php echo $item['valor']; ?></p>
                            </div>
                            <div class="d-flex justify-content-between pb-3">
                                <small class="text-muted">Taxa de Serviço</small>
                                <p>R$ 0,00</p>
                            </div>
                            <div class="d-flex justify-content-between pb-3">
                                <small class="text-muted">Desconto</small>
                                <p style="color: green;" id="desconto">R$ 0.00</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted" style="font-weight: bold;">Valor Total</small>
                                <p id="precoFinal">R$ <?php echo $item['valor']; ?></p>
                            </div>
                        </div>
                        <button class="btn sale my-3" id="btnAgendar" name="btnAgendar">Agendar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>
    <script src="assets/js/telaFinalizar.js"></script>

</body>

</html>