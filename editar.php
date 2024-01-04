<?php
session_start();
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

    <link href=rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/minhaConta.css">
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



            <div class="content">
                <h3>Minha Conta</h3>
                <div class="divForm">
                    <form id="form" action="./backend/functionCadastro.php" method="POST" class="">
                        <div class="form-group">
                            <div class="row">
                                <h6 class="heading-small text-muted mb-4">Informações do usuário</h6>
                                <button title="Editar" type="button" class="btn btn-danger" id="btnEditar" onclick="atualizarInfo('btnEditar');"><i class="bi bi-pencil-square"></i></button>
                                <div class="col-lg-6">
                                    <?php

                                    require('./backend/conexao.php');

                                    /*$id = $_SESSION['id'];

$sql = "SELECT * FROM cliente WHERE id_cliente = '$id' LIMIT 1";
$result = $conn->query($sql);*/

                                    // while ($dado = $result->fetch_array()) { 
                                    ?>
                                    <label for="nome" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" id="nome" pattern="[^0-9]*" name="nome" placeholder="João" value="<?php echo $dado['nome']; ?>" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="sobrenome" class="form-label">Sobrenome:</label>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Silva" value="<?php echo $dado['sobrenome']; ?>" required>
                                </div>

                            </div>
                        </div>

                        <!--SEXO CPF TELEFONE-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sexo" class="form-label">Sexo:</label>
                                    <select class="form-select" id="sexo" name="sexo" disabled>
                                        <option value="masculino" <?php if ($dado['sexo'] == 'masculino') echo 'selected'; ?>>
                                            Masculino</option>
                                        <option value="feminino" <?php if ($dado['sexo'] == 'feminino') echo 'selected'; ?>>Feminino
                                        </option>
                                        <option value="nbinario" <?php if ($dado['sexo'] == 'nbinario') echo 'selected'; ?>>Não
                                            binário</option>
                                        <option value="ninformado" <?php if ($dado['sexo'] == 'ninformado') echo 'selected'; ?>>
                                            Prefiro não informar</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="telefone" class="form-label">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Apenas números" value="<?php echo $dado['telefone']; ?>" required>
                                    <span class="span-required">Telefone em uso!</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="cpf" class="form-label">CPF:</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Apenas números" value="<?php echo $dado['cpf']; ?>" required>
                                    <span class="span-required">CPF em uso!</span>
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
                                    <input type="text" class="form-control" id="cep" name="cep" size="10" maxlength="9" onblur="pesquisacep(this.value);" onkeyup="formatarCEP(this);" value="<?php echo $dado['cep']; ?>" placeholder="Apenas n.º" required>
                                    <span class="span-required">CEP Inválido!</span>
                                </div>
                                <div class="col-md-7">
                                    <label for="rua" class="form-label">Rua:</label>
                                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Sua rua" value="<?php echo $dado['rua']; ?>" required disabled>
                                    <input type="hidden" id="rua_oculto" name="rua_oculto" value="">
                                </div>
                                <div class="col-md-2">
                                    <label for="num" class="form-label">Nº ou Apto:</label>
                                    <input type="text" class="form-control" id="num" name="num" placeholder="202-A" value="<?php echo $dado['numero']; ?>" required>
                                </div>
                            </div>
                        </div>

                        <!--BAIRRO CIDADE UF-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="bairro" class="form-label">Bairro:</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Seu bairro" value="<?php echo $dado['bairro']; ?>" required disabled>
                                    <input type="hidden" id="bairro_oculto" name="bairro_oculto" value="">
                                </div>
                                <div class="col-md-7">
                                    <label for="cidade" class="form-label">Cidade:</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="<?php echo $dado['cidade']; ?>" required disabled>
                                    <input type="hidden" id="cidade_oculto" name="cidade_oculto" value="">
                                </div>
                                <div class="col-md-2">
                                    <label for="uf" class="form-label">UF:</label>
                                    <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" value="<?php echo $dado['uf']; ?>" required disabled>
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
                                <input type="email" class="form-control" id="email" name="email" placeholder="nome@email.com" value="<?php echo $dado['email']; ?>" disabled>
                                <span class="span-aviso">O e-mail não pode ser editado.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="senha" class="form-label">Senha Atual:</label>
                                    <input type="password" class="form-control" id="senhaAntiga" name="senha" placeholder="*********" required disabled>
                                </div>
                                <div class="align-items-center d-flex flex-column col-md-2">
                                    <button type="button" id="btnSenha" class="btnSenha" onclick="atualizarInfo('btnSenha');">Atualizar senha</button>
                                </div>
                                <div class="col-md-6">
                                    <label for="senha" class="form-label">Nova senha:</label>
                                    <input type="password" class="form-control" id="senhaNova" name="senha" placeholder="*********" required disabled>
                                </div>
                                <div class="align-items-center d-flex flex-column" style="padding-top: 3%;">
                                    <button type="button" id="btnAtualizar" class="btn btn-primary btn-lg" onclick="atualizarInfo('btnAtualizar');" disabled>Atualizar
                                        informações</button>
                                </div>
                            </div>
                        </div>
                </div>
                <?php //} 
                ?>
                </form>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
                </script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <script src="assets/js/minhaConta.js"></script>
            </div>