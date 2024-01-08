<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Agenda / Portal do Parceiro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Our Custom CSS -->

    <link rel="stylesheet" href=".//assets/css/style4.css" />
    <style>
        #botao {
            background-color: #D21742;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
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
                        <span class="material-symbols-outlined">
                            menu
                        </span>
                    </button>
                </div>
            </div>
            </nav>
            <h1>Cortes / Serviços oferecidos pelo estabelecimento</h1>
            <button onclick="adicionarCategoria()">+ Adicionar categoria</button>
            <div id="caixaCategoria" class="hidden">

                <input type="text" placeholder="Nome da categoria">
                <button>Adicionar categoria</button>
            </div>
            <br><br>
            <button id="btnAdicionar" onclick="abrirCaixa()">+ Adicionar item</button>

            <div id="caixaInputs" class="hidden">
                <select class="form-select" placeholder="Categoria">
                    <option value="corte">Corte</option>
                    <option value="barba">Barba</option>
                </select>
                <input type="text" placeholder="Nome do item">
            </div>
            <br>

            <br>
            <input type="file" id="botao">

            <table>
                <tr>
                    <th>Item</th>
                    <br>
                    <th>Preço</th>
                    <br>
                    <th>Disponibilidade</th>
                </tr>
                <tr>
                    <td>Corte Freestyle</td>
                    <td>R$25,00</td>
                    <td><input type="radio" id="disponivel" name="disponibilidade" value="disponivel">
                        <label for="disponivel">Disponível</label><br>
                        <input type="radio" id="indisponivel" name="disponibilidade" value="indisponivel">
                        <label for="indisponivel">Indisponível</label><br>
                    </td>
                </tr>
                <!-- Adicione mais linhas conforme necessário -->
            </table>

            <script>
                function abrirCaixa() {
                    var caixaInputs = document.getElementById('caixaInputs');
                    caixaInputs.classList.toggle('hidden');
                }

                function AdicionarItem(item, categoria) {
                    // Cria um novo item
                    var novoItem = {
                        item: item,
                        categoria: categoria
                    };

                    // Verifica se a categoria já existe
                    if (this.hasOwnProperty(categoria)) {
                        // Se a categoria existir, adiciona o item à categoria
                        this[categoria].push(novoItem);
                    } else {
                        // Se a categoria não existir, cria uma nova categoria com o item
                        this[categoria] = [novoItem];
                    }
                }


                // Função para adicionar categoria
                function adicionarCategoria() {
                    var caixaInputs = document.getElementById('caixaCategoria');
                    caixaInputs.classList.toggle('hidden');

                    let btn = document.createElement("button");
                    btn.textContent = "Adicionar Categoria";
                    btn.id = "btnAdicionar";

                    // Adicionar o campo de texto e o botão ao body
                    document.body.appendChild(input);
                    document.body.appendChild(btn);

                    // Evento para o botão de adicionar categoria
                    document.getElementById("btnAdicionar").addEventListener("click", function() {
                        // Pegar o valor do campo de texto
                        nomeCategoria = document.getElementById("categoriaInput").value;

                        // Criar um novo elemento h2 para adicionar a categoria à página web
                        let h2 = document.createElement("h2");
                        h2.textContent = nomeCategoria;

                        // Adicionar o novo elemento h2 ao body
                        document.body.appendChild(h2);

                        // Remover o campo de texto e o botão da página web
                        document.getElementById("categoriaInput").remove();
                        document.getElementById("btnAdicionar").remove();
                    });
                }
            </script>
            <!-- jQuery CDN -->
            <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
            <!-- Bootstrap Js CDN -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>

</body>

</html>