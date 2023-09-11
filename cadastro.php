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

<body style="background-image: url('../TCC/assets/img/2.jpg');">

    <section class="main">
        <div class="container">
            <div class="row align-items-center justify-content-end ">
                <div class="col-md-7">
                   
                </div>
                <div class="col-md-5">
                    <!--FORMULÁRIO-->
                    <form action="./backend/functionCadastro.php" method="POST" class="row g-3 p-3 needs-validation">
                        <h1>Cadastre-se</h1>

                        <!--NOME SOBRENOME-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="João" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="sobrenome" class="form-label">Sobrenome:</label>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Silva" required>
                                </div>
                            </div>
                        </div>

                        <!--SEXO CPF TELEFONE-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sexo" class="form-label">Sexo:</label>
                                    <select class="form-select" id="sexo" name="sexo">
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                        <option value="feminino">Não binário</option>
                                        <option value="Ninformado">Prefiro não informar</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="cpf" class="form-label">CPF:</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" oninput="formCPF(this)" placeholder="Apenas números" required>
                                    <div class="invalid-feedback">CPF Inválido</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="telefone" class="form-label">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Apenas números" required>
                                </div>
                            </div>
                        </div>

                        <!--CEP RUA Nº-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cep" class="form-label">CEP:</label>
                                    <input type="text" class="form-control" id="cep" name="cep" size="10" maxlength="9" onblur="pesquisacep(this.value);" onkeyup="formatarCEP(this);" placeholder="Apenas n.º" required>
                                </div>
                                <div class="col-md-7">
                                    <label for="rua" class="form-label">Rua:</label>
                                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Sua rua" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="num" class="form-label">Nº/Apto:</label>
                                    <input type="text" class="form-control" id="num" name="num" placeholder="202-A" required>
                                </div>
                            </div>
                        </div>

                        <!--BAIRRO CIDADE UF-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="bairro" class="form-label">Bairro:</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Seu bairro">
                                </div>
                                <div class="col-md-7">
                                    <label for="cidade" class="form-label">Cidade:</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="uf" class="form-label">UF:</label>
                                    <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" disabled>
                                </div>
                            </div>
                        </div>

                        <!--EMAIL SENHA-->
                        <div class="row g-2 align-items-center">
                            <div class="mx-auto">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="nome@email.com" required>
                            </div>
                            <div class="mx-auto">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="*********">
                                <div id="passwordHelpBlock" class="form-text mb-3">
                                    Sua senha deve ter no mínimo 8 caracteres, com no mínimo 1 letra maiúscula.
                                </div>
                            </div>
                            <button type="submit" id="btn-cadastrar" class="btn btn-primary btn-lg meu-botao">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/validator@latest/validator.min.js"></script>
    <script src="assets/js/cadastro.js"></script>
</body>

</html>