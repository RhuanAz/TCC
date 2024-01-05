$(document).ready(function () {
    // Pega o id da URL
    const urlParams = new URLSearchParams(window.location.search);
    const idItem = urlParams.get('id');

    function buscaHorario(metodo) {
        // Verifica se o id está presente
        if (idItem) {
            // Faz uma requisição AJAX para o PHP
            $.ajax({
                url: 'backend/functionGetData.php?action=' + metodo, // Substitua pelo caminho correto do seu arquivo PHP
                type: 'GET',
                data: { id: idItem }, // Passa o id como parâmetro
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
    buscaHorario('getHora');
});


function aplicarCupom() {
    var spanCupom = document.getElementById("mensagemErro");
    var codigoCupom = document.getElementById("codigoCupom").value;
    var preco = document.getElementById("preco").textContent;
    console.log(preco);

    preco = preco.replace('R$', ''); // Remove "R$" e substitui "," por "."
    var preco = parseFloat(preco); // Converte a string em um número
    console.log(preco);
    console.log(codigoCupom);
    
    if (codigoCupom == "PRIMEIRA5") {
        
    } else {
        spanCupom.style.display = 'block';
    }

    // Lógica para exibir a mensagem de erro, se necessário
    // mensagemErro.textContent = "Mensagem de erro aqui";
}

