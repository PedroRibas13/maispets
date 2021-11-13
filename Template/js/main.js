function fMasc(objeto, mascara) {
    obj = objeto
    masc = mascara
    setTimeout("fMascEx()", 1)
}

function fMascEx() {
    obj.value = masc(obj.value)
}

function mTel(tel) {
    tel = tel.replace(/\D/g, "")
    tel = tel.replace(/^(\d)/, "($1")
    tel = tel.replace(/(.{3})(\d)/, "$1) $2")
    if (tel.length == 9) {
        tel = tel.replace(/(.{1})$/, "-$1")
    } else if (tel.length == 10) {
        tel = tel.replace(/(.{2})$/, "-$1")
    } else if (tel.length == 11) {
        tel = tel.replace(/(.{3})$/, "-$1")
    } else if (tel.length == 12) {
        tel = tel.replace(/(.{4})$/, "-$1")
    } else if (tel.length > 12) {
        tel = tel.replace(/(.{4})$/, "-$1")
    }
    return tel;
}

function mCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, "")
    cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2")
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2")
    cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2")
    return cnpj
}

function mCEP(cep) {
    cep = cep.replace(/\D/g, "")
    cep = cep.replace(/^(\d{2})(\d)/, "$1.$2")
    cep = cep.replace(/\.(\d{3})(\d)/, ".$1-$2")
    return cep
}

function mNum(num) {
    num = num.replace(/\D/g, "")
    return num
}

function mRG(rg) {
    rg = rg.replace(/\D/g, "")
    rg = rg.replace(/(\d{2})(\d)/, "$1.$2")
    rg = rg.replace(/(\d{3})(\d)/, "$1.$2")
    rg = rg.replace(/(\d{3})(\d{1})$/, "$1-$2")
    return rg
}

function previewImage(){
    var imagem = document.querySelector('input[name=img_name]').files[0];
    var preview = document.querySelector('.img-prev');

    var reader = new FileReader();

    reader.onloadend = function(){
        preview.src = reader.result;
    }
    if(imagem){
        reader.readAsDataURL(imagem);
    }
    else{
        preview.src = "";
    }
}

function validarSenha() {
    var senha = document.getElementById("senha");
    var confirmar_senha = document.getElementById("confirmar_senha");

    if (senha.value != confirmar_senha.value) {
        alert("Senhas diferentes!");
    } else {
        return "Senhas iguais";
    }
}

function checarEmail(){
    if(document.forms[0].email.value == "" || document.forms[0].email.value.indexOf('@') == -1 || document.forms[0].email.value.indexOf('.') == -1)
    {
        alert("Por favor, informe um EMAIL válido!");
        document.getElementById('email').value='';
        return false;
    }
}

function validaCNPJ() {
    var validarCNPJ = document.getElementById("cnpj").value;

    if(validarCNPJ == '') {
        alert("Por favor, informe um CNPJ válido este esta vazio!");
        
        document.getElementById('cnpj').value='';
        return false;
    }
    else{
        if (validarCNPJ.length != 14) {
            alert("Por favor, informe um CNPJ válido!");
            document.getElementById('cnpj').value = '';
            return false;
        }
        else{
            if (validarCNPJ == 00000000000000 || validarCNPJ == 11111111111111 || validarCNPJ == 22222222222222 || validarCNPJ == 33333333333333 || validarCNPJ == 44444444444444 ||  validarCNPJ == 55555555555555 ||  validarCNPJ == 66666666666666 || validarCNPJ == 77777777777777 || validarCNPJ == 88888888888888 || validarCNPJ == 99999999999999){
                alert("Por favor, informe um CNPJ válido!");
                document.getElementById('cnpj').value = '';
                return false;
            }
            else{
                tamanho = validarCNPJ.length - 2;
                numeros = validarCNPJ.substring(0, tamanho);
                digitos = validarCNPJ.substring(tamanho);
                soma = 0;
                pos = tamanho - 7;

                for(i = tamanho; i>= 1; i--){
                    soma += numeros.charAt(tamanho - i) * pos--;
                    if(pos < 2){
                        pos = 9;
                    }
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if(resultado != digitos.charAt(0)){
                    alert("Por favor, informe um CNPJ válido!");
                    document.getElementById('cnpj').value = '';
                    return false
                }

                tamanho = tamanho + 1;
                numeros = validarCNPJ.substring(0, tamanho);
                soma = 0;
                pos = tamanho - 7;
                for(i = tamanho; i>=1; i--){
                    soma += numeros.charAt(tamanho - i) * pos--;
                    if(pos < 2){
                        pos = 9;
                    }
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if(resultado != digitos.charAt(1)){
                    alert("Por favor, informe um CNPJ válido!");
                    document.getElementById('cnpj').value = '';
                    return false;
                }
                return true;
            }
        }
    }
    
    return true;
}

function desabilitar(selecionado)
{
    document.getElementById('nascimento').disabled = selecionado;
}


function desabVac(selecionado)
{
    document.getElementById('vacina1').disabled = selecionado;
    document.getElementById('vacina2').disabled = selecionado;
    document.getElementById('vacina3').disabled = selecionado;
    document.getElementById('vacina4').disabled = selecionado;
    document.getElementById('vacina5').disabled = selecionado;
    document.getElementById('vacina6').disabled = selecionado;
    document.getElementById('vacina7').disabled = selecionado;
    document.getElementById('vacina8').disabled = selecionado;
    document.getElementById('vacina9').disabled = selecionado;
}

//teste de select e input
$(document).ready(function(){
    $('#select').on('change',function(){
        var selectValor = '#'+$(this).val();
        $('#pai').children('div').hide();
        $('#pai').children(selectValor).show();
    });
});



