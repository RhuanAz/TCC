<?php
require('./backend/verificaLogin.php');
require('./backend/functionList.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/minhaConta.css">
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
                            <a class="dropdown-item" href="#">
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

    <div class="content">
        <h3>Minha Conta</h3>
        <div class="divForm">
            <form id="form" action="./backend/functionCadastro.php" method="POST" class="">
                <div class="form-group">
                    <div class="row">
                        <h6 class="heading-small text-muted mb-4">Informações do usuário</h6>
                        <button title="Editar" type="button" class="btn btn-danger" id="btnEditar" onclick="statusInput();"><i class="bi bi-pencil-square"></i></button>
                        <div class="col-lg-6">
                            <?php while($dado = $result->fetch_array()) { ?>
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" pattern="[^0-9]*" name="nome" placeholder="João" value="<?php echo $dado['nome'];?>" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="sobrenome" class="form-label">Sobrenome:</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Silva" value="<?php echo $dado['sobrenome'];?>"required>
                        </div>
                       
                    </div>
                </div>

                <!--SEXO CPF TELEFONE-->
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select class="form-select" id="sexo" name="sexo">
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="feminino">Não binário</option>
                                <option value="Ninformado">Prefiro não informar</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Apenas números" required>
                            <span class="span-required">Telefone em uso!</span>
                        </div>
                    </div>
                </div>

                <!--CEP RUA Nº-->
                <div class="form-group">
                    <!--Borda-->
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Endereço</h6>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="cep" class="form-label">CEP:</label>
                            <input type="text" class="form-control" id="cep" name="cep" size="10" maxlength="9" onblur="pesquisacep(this.value);" onkeyup="formatarCEP(this);" placeholder="Apenas n.º" required>
                            <span class="span-required">CEP Inválido!</span>
                        </div>
                        <div class="col-md-7">
                            <label for="rua" class="form-label">Rua:</label>
                            <input type="text" class="form-control" id="rua" name="rua" placeholder="Sua rua" required>
                            <input type="hidden" id="rua_oculto" name="rua_oculto" value="">
                        </div>
                        <div class="col-md-2">
                            <label for="num" class="form-label">Nº ou Apto:</label>
                            <input type="text" class="form-control" id="num" name="num" placeholder="202-A" required>
                        </div>
                    </div>
                </div>

                <!--BAIRRO CIDADE UF-->
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="bairro" class="form-label">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Seu bairro" required>
                            <input type="hidden" id="bairro_oculto" name="bairro_oculto" value="">
                        </div>
                        <div class="col-md-7">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required disabled>
                            <input type="hidden" id="cidade_oculto" name="cidade_oculto" value="">
                        </div>
                        <div class="col-md-2">
                            <label for="uf" class="form-label">UF:</label>
                            <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" required disabled>
                            <input type="hidden" id="uf_oculto" name="uf_oculto" value="">
                        </div>
                    </div>
                </div>

                <!--EMAIL SENHA-->
                <div class="align-items-center">
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Informações de Login</h6>
                    <div class="form-group mx-auto">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nome@email.com">
                    </div>
                    <div class="form-group mx-auto">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="*********" required>
                    </div>
                    <div class="align-items-center d-flex flex-column" style="padding-top: 2%;">
                        <button type="button" id="btnAtualizar" class="btn btn-primary btn-lg" onclick="atualizarInfo();" disabled>Atualizar
                            informações</button>
                    </div>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/minhaConta.js"></script>
</body>

</html>