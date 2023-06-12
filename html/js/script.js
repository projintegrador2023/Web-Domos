let arroba = /@/;
let final_email = /.com/;
let ponto = /./g;
let hifen = /-/;

function validacao_login(){
    let cpf_cnpj = document.querySelector("#cpf_cnpj").value;
    let erro_cpf_cnpj = document.querySelector("#erro_login_cpf_cnpj");
    let erro_senha = document.querySelector("#erro_login_senha");
    let senha = document.querySelector("#senha_login").value;

    if (verificar_ponto_cpf_cnpj(cpf_cnpj.match(ponto)) && cpf_cnpj.match(hifen) == null){
        if (cpf_cnpj.length < 11){
            erro_cpf_cnpj.innerHTML = "Insira um cpf completo.";
        }
        else if(cpf_cnpj.length > 11 && cpf_cnpj.length < 14){
            erro_cpf_cnpj.innerHTML = "Insira um cnpj completo.";
        }
        else if(senha.length < 8){
            erro_cpf_cnpj.innerHTML = '';
            erro_senha.innerHTML = "A senha precisa ter no mínimo 8 caracteres.";
        }
        else {
            window.location.href = "./avisos.html";
        }
    }
    else {
        erro_cpf_cnpj.innerHTML = "Insira apenas números.";
    }
    
}

function verificar_ponto_cpf_cnpj(lista){
    let sem_ponto = true;
    for (let i = 0; i < lista.length; i++){
        if (lista[i] == '.'){
            sem_ponto = false;
        }
    }
    return sem_ponto;
}

function validacao_recuperar_senha(){
    let email = document.querySelector("#input_email").value;
    if (email.match(arroba) != null && email.match(final_email) != null){
        alert("Cheque sua caixa de email para alterar sua senha.");
        window.location.href = "./login.html";
    }
    else{
        document.querySelector("#erro_recuperar_senha_email").innerHTML = "Insira um email válido.";
    }
}