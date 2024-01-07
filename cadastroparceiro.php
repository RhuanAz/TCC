<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastre-se</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/cadastro.css">

</head>

<body style="background-image: url('../TCC/assets/img/2.jpg'); background-repeat:no-repeat">

    <section class="main">
        <div class="container">
            <div class="row align-items-center justify-content-end ">
                <div class="col-md-11">
                </div>
                <div class="col-md-6">
                    <!--FORMULÁRIO-->
                    <form id="form" action="./backend/functionCadastroParceiro.php" method="POST" class="row g-3 p-3 needs-validation">
                        <h1>Cadastre-se no Portal do Parceiro</h1>

                        <!--NOME Fantasia-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nome" class="form-label">Nome Fantasia:</label>
                                    <input type="text" class="form-control" id="nome" pattern="[^0-9]*" name="nome_fantasia" placeholder="Barbearia" required>
                                </div>
                            </div>
                        </div>

                        <!--CPF TELEFONE-->
                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label for="cnpj" class="form-label">CNPJ:</label>
                                    <input type="text" class="form-control" id="cnpj" maxlength="18" name="cnpj" placeholder="Apenas números" required>
                                    <span class="span-required">CNPJ em uso!</span>
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
                                    <label for="num" class="form-label">Nº:</label>
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
                        <div class="row g-2 align-items-center">
                            <div class="mx-auto">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="nome@email.com" required>
                                <span class="span-required">E-mail em uso!</span>
                            </div>
                            <div class="mx-auto">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="*********" required>                               
                            </div>
                            <button type="submit" id="btn-cadastrar" class="btn btn-primary btn-lg meu-botao">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/validator@latest/validator.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/cadastroParceiro.js"></script>
</body>
</html>