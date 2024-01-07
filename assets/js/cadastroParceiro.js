//VERIFICAR SE O DADO JÁ ESTÁ NO BD
$(document).ready(function () {
    // Função genérica para verificar dados
    function verificarDado(metodo, campoId, indexInput, indexSpan) {
        var valor = $(campoId).val();
        var tela = "cadastroparceiro";
        var table = "barbearia";
        // Criando objeto para enviar para o "verificaDado.php"
        var parametros = {
            'metodo': metodo,
            'column': valor,
            'tela': tela,
            'table': table
        };

        // Solicitação POST AJAX para o arquivo 'verificaDado.php' passando o objeto "parametros"
        $.post('backend/verificaDado.php', parametros, function (data) {
            console.log(data);
            if (data == "true") {
                setError(indexInput, indexSpan);
            } else {
                removeError(indexInput, indexSpan);
            }
        });
    }

    // Executar quando o campo "CPF" perde o foco
    $("#cnpj").blur(function () {
        verificarDado("cnpj", "#cnpj", 1, 0);
    });

    // Executar quando o campo "Email" perde o foco
    $("#email").blur(function () {
        verificarDado("email", "#email", 9, 3);
    });

    // Executar quando o campo "Telefone" perde o foco
    $("#telefone").blur(function () {
        verificarDado("telefone", "#telefone", 2, 1);
    });

});


//--Add erro nas imputs
const spans = document.querySelectorAll('.span-required');
const campos = document.querySelectorAll('input[required]')
const form = document.getElementById('form');


form.addEventListener('submit', (event) => {

    const rua = document.getElementById('rua').value;
    const bairro = document.getElementById('bairro').value;
    const cidade = document.getElementById('cidade').value;
    const uf = document.getElementById('uf').value;

    document.getElementById('rua_oculto').value = rua;
    document.getElementById('bairro_oculto').value = bairro;
    document.getElementById('cidade_oculto').value = cidade;
    document.getElementById('uf_oculto').value = uf;

    if (verifError()) {
        event.preventDefault(); // Impede o envio do formulário se houver erros
        alert('Há erros no formulário. Por favor, corrija-os antes de enviar.');
    }
});

//Add borda e span vermelhos
function setError(indexInput, indexSpan) {
    campos[indexInput].style.border = '1px solid #e63636';
    spans[indexSpan].style.display = 'block';
}

//Remover borda e span vermelhos
function removeError(indexInput, indexSpan) {
    //Remover borda e span
    campos[indexInput].style.border = '';
    spans[indexSpan].style.display = 'none';
}

//Verificar se possui erros
function verifError() {
    let hasError = false;

    spans.forEach(function (elemento) {
        if (elemento.style.display === 'block') {
            hasError = true;
        }
    });

    return hasError;
}



//--BUSCAR CEP NA API--
function limpa_formulário_cep() {
    //Limpa valores do formulário de endereco.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.     
        removeError(4, 2);
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);

    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        setError(4, 2);
    }
    //Verificar se o CEP retorna rua e bairro
    var rua = document.getElementById('rua');
    var bairro = document.getElementById('bairro');

    //Habilitar ou desabilitar inputs do HTML
    if (rua.value === "" && bairro.value === "") {
        rua.disabled = false;
        bairro.disabled = false;
    } else {
        rua.disabled = true;
        bairro.disabled = true;
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};
//------

document.getElementById('cnpj').addEventListener('input', function () {
    // Remove caracteres não numéricos
    let cnpj = this.value.replace(/\D/g, '');

    // Formatação do CNPJ (XX.XXX.XXX/YYYY-ZZ)
    if (cnpj.length <= 2) {
        cnpj = cnpj.replace(/(\d{2})/, '$1');
    } else if (cnpj.length <= 5) {
        cnpj = cnpj.replace(/(\d{2})(\d{3})/, '$1.$2');
    } else if (cnpj.length <= 8) {
        cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})/, '$1.$2.$3');
    } else if (cnpj.length <= 12) {
        cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})/, '$1.$2.$3/$4');
    } else {
        cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
    }

    // Atualiza o valor do input com o CNPJ formatado
    this.value = cnpj;
});

//Formatar CEP
function formatarCEP(cepInput) {

    // Remove todos os caracteres não numéricos
    var cepFormatado = cepInput.value.replace(/\D/g, '');

    // Verifica se o CEP tem pelo menos 8 dígitos
    if (cepFormatado.length >= 8) {
        // Formata o CEP como "XXXXX-XXX"
        cepFormatado = cepFormatado.substring(0, 5) + '-' + cepFormatado.substring(5, 8);
    }

    // Define o valor formatado no campo de entrada
    cepInput.value = cepFormatado;

}
