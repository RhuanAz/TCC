//VERIFICAR SE O DADO JÁ ESTÁ NO BD
$(document).ready(function () {
    //Executar quando o campo "CPF" perde o foco
    $("#cpf").blur(function () {
        var metodo = "verifCPF";
        var cpf = $("#cpf").val();

        //Criando objeto para enviar para o "verificaDado.php"
        var parametros = {
            'metodo': metodo,
            'column': cpf
        };

        //Solicitação POST AJAX para o arquivo 'verificaDado.php' passando o objeto "parametros"
        $.post('backend/verificaDado.php', parametros, function (data) {
            console.log(data);
            if (data == "true") {
                setError(2, 0);
            } else {
                removeError(2, 0);
            }
        })
    })

    //Executar quando o campo "Email" perde o foco
    $("#email").blur(function () {
        var metodo = "verifEmail";
        var email = $("#email").val();

        //Criando objeto para enviar para o "verificaDado.php"
        var parametros = {
            'metodo': metodo,
            'column': email
        };

        //Solicitação POST AJAX para o arquivo 'verificaDado.php' passando o objeto "parametros"
        $.post('backend/verificaDado.php', parametros, function (data) {
            console.log(data);
            if (data == "true") {
                setError(10, 3);
            } else {
                removeError(10, 3);
            }
        })
    })

    //Executar quando o campo "Telefone" perde o foco
    $("#telefone").blur(function () {
        var metodo = "verifTelefone";
        var email = $("#telefone").val();

        //Criando objeto para enviar para o "verificaDado.php"
        var parametros = {
            'metodo': metodo,
            'column': email
        };

        //Solicitação POST AJAX para o arquivo 'verificaDado.php' passando o objeto "parametros"
        $.post('backend/verificaDado.php', parametros, function (data) {
            console.log(data);
            if (data == "true") {
                setError(3, 1);
            } else {
                removeError(3, 1);
            }
        })
    })

})


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
        setError(3, 1);
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

//Formatar CPF
document.getElementById('cpf').addEventListener('input', function (e) {
    // Remove caracteres não numéricos do valor atual do campo CPF
    var cpf = e.target.value.replace(/\D/g, '');

    // Verifica se o CPF possui pelo menos 11 dígitos
    if (cpf.length >= 11) {
        // Formata o CPF no formato XXX.XXX.XXX-XX
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');

        // Define o valor formatado de volta no campo de entrada
        e.target.value = cpf;

    }
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

function validarSenha(senha) {
    // Verifica se a senha tem pelo menos 8 caracteres e contém pelo menos 1 letra maiúscula
    return /^(?=.*[A-Z]).{8,}$/.test(senha);
}

function retornaSenha(senhaInput) {
    if (!validarSenha(senhaInput)) {

    }
}

