$(document).ready(function () {
    // Pega o id da URL
    const urlParams = new URLSearchParams(window.location.search);
    const idItem = urlParams.get('id');

    // Verifica se o id está presente
    if (idItem) {
        // Faz uma requisição AJAX para o PHP
        $.ajax({
            url: 'backend/functionGetDataHora.php', // Substitua pelo caminho correto do seu arquivo PHP
            type: 'GET',
            data: { id: idItem }, // Passa o id como parâmetro
            dataType: 'json',
            success: function (data) {
                console.log("Dados recebidos:", data);

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
                    console.log(item.length);
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

                console.log(diasVazios);

                flatpickr("#datetime", {
                    disable: [
                        function(date) {
                            // retorna verdadeiro se o dia da semana estiver em diasVazios
                            return diasVazios.includes(date.getDay());
                        }
                    ],
                    dateFormat: "d/m/Y", // Formato da data
                    minDate: "today", // Data mínima é hoje
                    locale: "pt", // Configuração de localização para português
                });
            },
            error: function (error) {
                console.error('Erro na requisição AJAX:', error);
            }
        });
    } else {
        console.error('ID não encontrado na URL.');
    }
});



function aplicarCupom() {
    var codigoCupom = document.getElementById("codigoCupom").value;


    var mensagemErro = document.getElementById("mensagemErro");

    // Lógica para exibir a mensagem de erro, se necessário
    // mensagemErro.textContent = "Mensagem de erro aqui";
}

