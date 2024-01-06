// Pega o id da URL
const urlParams = new URLSearchParams(window.location.search);
const idItem = urlParams.get('id');
var selectHorario = document.getElementById("selectHorario");
var datetimeInput = document.getElementById("datetime");

$(document).ready(function () {
    // Pega o id da URL
    function buscaHorario(metodo, diaSemana = null, dataInput = null) {
        // Verifica se o id está presente
        if (idItem) {
            // Faz uma requisição AJAX para o PHP
            $.ajax({
                url: 'backend/functionGetData.php?action=' + metodo, // Substitua pelo caminho correto do seu arquivo PHP
                type: 'GET',
                data: { id: idItem, diaSemana: diaSemana, dataInput: dataInput }, // Passa o id como parâmetro
                dataType: 'json',
                success: function (data) {
                    console.log("Dados recebidos:", data);
                    if (metodo === 'getData') {
                        // Mapeamento dos dias da semana
                        var diasDaSemana = {
                            "domingo": 0,
                            "segunda": 1,
                            "terca": 2,
                            "quarta": 3,
                            "quinta": 4,
                            "sexta": 5,
                            "sabado": 6
                        };

                        // Filtra os dias vazios
                        const diasVazios = data.reduce(function (acc, item) {
                            // Ignora o primeiro elemento do array interno (item[0]) pois parece ser um id
                            for (var i = 1; i < item.length; i++) {
                                var valor = item[i];
                                if (diasDaSemana.hasOwnProperty(valor)) {
                                    // Converte o nome do dia da semana para o número correspondente
                                    var numeroDoDia = diasDaSemana[valor];
                                    acc.push(numeroDoDia);
                                }
                            }
                            return acc;
                        }, []);

                        var dataAtual = new Date();
                        var dataLimite = new Date();
                        // Adiciona 2 meses à data atual
                        dataLimite.setMonth(dataAtual.getMonth() + 2);

                        flatpickr("#datetime", {
                            locale: "pt", // Configuração de localização para português
                            dateFormat: "d/m/Y", // Formato da data
                            disable: [
                                function (date) {
                                    // retorna verdadeiro se o dia da semana estiver em diasVazios
                                    return diasVazios.includes(date.getDay());
                                }
                            ],
                            minDate: "today", // Data mínima é hoje
                            maxDate: dataLimite,
                        });
                    } else if (metodo === 'getHora') {
                        // Remove as opções a partir do segundo filho
                        while (selectHorario.children.length > 1) {
                            selectHorario.removeChild(selectHorario.children[1]);
                        }
                        for (var i = 0; i < data.length; i++) {
                            var option = document.createElement('option');
                            option.value = data[i];
                            option.text = data[i];
                            selectHorario.add(option);
                        }
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Erro na requisição AJAX:', xhr.responseText);
                    console.error('Status:', status);
                    console.error('Erro:', error);
                }
            });
        } else {
            console.error('ID não encontrado na URL.');
        }
    }
    buscaHorario('getData');
    //buscaHorario('getHora');

    $("#datetime").on("input", function () {
        var dataInput = $(this).val(); // Obtenha o valor do campo de entrada
        var diaSemana = obterDiaSemana(dataInput);
        //console.log(diaSemana);
        // Formata a data para o padrão 'YYYY-MM-DD'
        var partes = dataInput.split('/');
        dataInput = partes[2] + '-' + partes[1] + '-' + partes[0];

        buscaHorario('getHora', diaSemana, dataInput);
    });

});

// Adicione um ouvinte de evento ao botão "btnAgendar"
document.getElementById("btnAgendar").addEventListener("click", function () {
    // Obtenha os dados necessários do HTML
    var data = datetimeInput.value;
    var horario = selectHorario.value;

    // Faça uma requisição AJAX para chamar a funçãoAgendar.php
    $.ajax({
        type: 'POST',
        url: 'backend/functionAgendar.php?id=' + idItem,
        data: JSON.stringify({
            data: data,
            horario: horario
        }),
        success: function (response) {
            // Manipule a resposta (se necessário)
            console.log(response);
            alert("Agendamento concluído com sucesso!");
            window.location.href = "barbearias.php";
        },
        error: function (error) {
            // Manipule erros (se necessário)
            console.error(error);
            alert("Erro ao agendar!");
        }
    });
});

function obterDiaSemana(dataString) {
    // Divide a string da data em dia, mês e ano
    var partesData = dataString.split('/');

    // Cria um objeto Date com base nos componentes da data
    var data = new Date(partesData[2], partesData[1] - 1, partesData[0]);

    // Dias da semana em JavaScript são representados de 0 (domingo) a 6 (sábado)
    // Então, vamos criar um array de nomes dos dias da semana
    var diasSemana = ['domingo', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado'];

    // Obtém o número do dia da semana (0 a 6)
    var numeroDiaSemana = data.getDay();

    // Retorna o nome do dia da semana correspondente
    return diasSemana[numeroDiaSemana];
}

function aplicarCupom() {
    var spanCupomErro = document.getElementById("mensagemErro");
    var spanCupomSucc = document.getElementById("cupomAplicado");
    var codigoCupomInput = document.getElementById("codigoCupom");


    var precoElement = document.getElementById("preco");
    var precoFinal = document.getElementById("precoFinal");

    // Remova o símbolo "R$" e substitua "," por "."
    var preco = parseFloat(precoElement.textContent.replace('R$', '').replace(',', '.'));
    var codigoCupom = codigoCupomInput.value;

    var precoDesconto = preco * 0.95;

    if (codigoCupom === "PRIMEIRA5") {
        console.log(precoDesconto);
        spanCupomSucc.style.display = 'block';
        spanCupomErro.style.display = 'none';
        precoFinal.textContent = "R$ " + precoDesconto.toFixed(2);
    } else {
        precoFinal.textContent = "R$ " + preco + ".00";
        spanCupomErro.style.display = 'block';
        spanCupomSucc.style.display = 'none';
    }
}

var btnAgendar = document.getElementById("btnAgendar");
// Desabilite o botão inicialmente
btnAgendar.disabled = true;

// Adicione ouvintes de eventos aos elementos
selectHorario.addEventListener("change", atualizarEstadoBotao);
datetimeInput.addEventListener("input", atualizarEstadoBotao);

// Função para verificar e atualizar o estado do botão
function atualizarEstadoBotao() {
    // Verifique se tanto o select quanto o input não estão nulos
    var selectNaoNulo = selectHorario.value !== "";
    var datetimeNaoNulo = datetimeInput.value !== "";

    // Habilitar ou desabilitar o botão com base nas condições
    btnAgendar.disabled = !(selectNaoNulo && datetimeNaoNulo);
}
