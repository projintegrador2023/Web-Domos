// expressoes regulares
const arroba = /@/;
const final_email = /.com/;
const ponto = /./g;
const hifen = /-/;

function validacao_login(){
    // elementos da tela
    let input_cpf_cnpj = document.getElementById("cpf_cnpj");
    let input_senha = document.getElementById("senha_login");
    let label_cpf_cnpj = document.getElementById("label_cpf_cnpj");
    let label_senha = document.getElementById("label_senha");
    let erro_cpf_cnpj = document.getElementById("erro_login_cpf_cnpj");
    let erro_senha = document.getElementById("erro_login_senha");

    // dados dos elementos
    let cpf_cnpj = input_cpf_cnpj.value;
    let senha = input_senha.value;

    // verifica se os dados foram preenchidos corretamente
    if (cpf_cnpj == ''){
        input_cpf_cnpj.classList.add("input-erro");
        label_cpf_cnpj.classList.add("text-danger");
        erro_cpf_cnpj.innerHTML = "Digite um CPF ou CNPJ.";
    }
    if (senha == ''){
        label_senha.classList.add("text-danger");
        input_senha.classList.add("input-erro");
        erro_senha.innerHTML = "Digite uma senha.";
    }
    if (cpf_cnpj != '' || senha != ''){
        if (verificar_ponto_cpf_cnpj(cpf_cnpj.match(ponto)) && cpf_cnpj.match(hifen) == null){
            if (cpf_cnpj.length < 11){
                input_cpf_cnpj.classList.add("input-erro");
                label_cpf_cnpj.classList.add("text-danger");
                erro_cpf_cnpj.innerHTML = "Digite um CPF completo.";
            }
            else if(cpf_cnpj.length > 11 && cpf_cnpj.length < 14){
                input_cpf_cnpj.classList.add("input-erro");
                label_cpf_cnpj.classList.add("text-danger");
                erro_cpf_cnpj.innerHTML = "Digite um CNPJ completo.";
            }
            else if(senha.length < 8){
                erro_cpf_cnpj.innerHTML = '';
                input_cpf_cnpj.classList.remove("input-erro");
                label_cpf_cnpj.classList.remove("text-danger");
                label_senha.classList.add("text-danger");
                input_senha.classList.add("input-erro");
                erro_senha.innerHTML = "A senha precisa ter no mínimo 8 caracteres.";
            }
            else {
                window.location.href = "./avisos.php";
            }
        }
        else {
            input_cpf_cnpj.classList.add("input-erro");
            label_cpf_cnpj.classList.add("text-danger");
            erro_cpf_cnpj.innerHTML = "Digite apenas números.";
        }    
    }   
}

function validacao_cadastro_usuario(){
    // labels da tela
    let label_nome_usuario = document.getElementById("label_nome_usuario");
    let label_cpf_usuario = document.getElementById("label_cpf_usuario");
    let label_email_usuario = document.getElementById("label_email_usuario");
    let label_senha_usuario = document.getElementById("label_senha_usuario");
    let label_conf_senha_usuario = document.getElementById("label_conf_senha_usuario");
    let label_codigo_condominio = document.getElementById("label_codigo_condominio");

    // elementos de interação da tela
    let input_nome_usuario = document.getElementById("nome_usuario");
    let input_cpf_usuario = document.getElementById("cpf_usuario");
    let input_email_usuario = document.getElementById("email_usuario");
    let input_senha_usuario = document.getElementById("senha_usuario");
    let input_conf_senha_usuario = document.getElementById("conf_senha_usuario");
    let input_codigo_condominio = document.getElementById("input_codigo_condominio");
    
    // elementos de erro da tela
    let erro_nome_usuario = document.getElementById("erro_nome_usuario");
    let erro_cpf_usuario = document.getElementById("erro_cpf_usuario");
    let erro_email_usuario = document.getElementById("erro_email_usuario");
    let erro_senha_usuario = document.getElementById("erro_senha_usuario");
    let erro_conf_senha_usuario = document.getElementById("erro_conf_senha_usuario");
    let erro_codigo_condominio = document.getElementById("erro_codigo_condominio");

    // dados dos elementos de interação
    let nome_usuario = input_nome_usuario.value;
    let cpf_usuario = input_cpf_usuario.value;
    let email_usuario = input_email_usuario.value;
    let senha_usuario = input_senha_usuario.value;
    let conf_senha_usuario = input_conf_senha_usuario.value;
    let codigo_condominio = input_codigo_condominio.value;

    // verifica se os dados foram incluidos corretamente

    if (nome_usuario == ''){
        label_nome_usuario.classList.add("text-danger");
        input_nome_usuario.classList.add("input-erro");
        erro_nome_usuario.innerHTML = "Digite seu nome.";
    }
    else{
        label_nome_usuario.classList.remove("text-danger");
        input_nome_usuario.classList.remove("input-erro");
        erro_nome_usuario.innerHTML = '';
    }

    if (cpf_usuario == ''){
        input_cpf_usuario.classList.add("input-erro");
        label_cpf_usuario.classList.add("text-danger");
        erro_cpf_usuario.innerHTML = "Digite um CPF.";
    }
    else if (verificar_ponto_cpf_cnpj(cpf_usuario.match(ponto)) && cpf_usuario.match(hifen) == null) {
        if (cpf_usuario.length == 11){
            input_cpf_usuario.classList.remove("input-erro");
            label_cpf_usuario.classList.remove("text-danger");
            erro_cpf_usuario.innerHTML = '';
        }
        else{
            input_cpf_usuario.classList.add("input-erro");
            label_cpf_usuario.classList.add("text-danger");
            erro_cpf_usuario.innerHTML = "Digite um CPF válido.";
        }
        
    }
    else {
        input_cpf_usuario.classList.add("input-erro");
        label_cpf_usuario.classList.add("text-danger");
        erro_cpf_usuario.innerHTML = "Digite apenas números.";       
    }

    if (email_usuario == ''){
        label_email_usuario.classList.add("text-danger");
        input_email_usuario.classList.add("input-erro");
        erro_email_usuario.innerHTML = "Digite um e-mail.";
    }
    else if (email_usuario.match(arroba) == null || email_usuario.match(final_email) == null){
        label_email_usuario.classList.add("text-danger");
        input_email_usuario.classList.add("input-erro");
        erro_email_usuario.innerHTML = "Insira um email válido.";
    }
    else{
        label_email_usuario.classList.remove("text-danger");
        input_email_usuario.classList.remove("input-erro");
        erro_email_usuario.innerHTML = '';
    }

    if (senha_usuario == ''){
        label_senha_usuario.classList.add("text-danger");
        input_senha_usuario.classList.add("input-erro");
        erro_senha_usuario.innerHTML = "Digite uma senha.";
    }
    else if (senha_usuario.length < 8){
        label_senha_usuario.classList.add("text-danger");
        input_senha_usuario.classList.add("input-erro");
        erro_senha_usuario.innerHTML = "Sua senha deve ter no mínimo 8 caracteres.";
    }
    else{
        label_senha_usuario.classList.remove("text-danger");
        input_senha_usuario.classList.remove("input-erro");
        erro_senha_usuario.innerHTML = '';
    }

    if (conf_senha_usuario == ''){
        label_conf_senha_usuario.classList.add("text-danger");
        input_conf_senha_usuario.classList.add("input-erro");
        erro_conf_senha_usuario.innerHTML = "Digite uma senha.";
    }
    else if (conf_senha_usuario != senha_usuario){
        label_conf_senha_usuario.classList.add("text-danger");
        input_conf_senha_usuario.classList.add("input-erro");
        erro_conf_senha_usuario.innerHTML = "As senhas digitadas são diferentes.";
    }
    else {
        label_conf_senha_usuario.classList.remove("text-danger");
        input_conf_senha_usuario.classList.remove("input-erro");
        erro_conf_senha_usuario.innerHTML = '';
    }
    
    if (codigo_condominio == ''){
        label_codigo_condominio.classList.add("text-danger");
        input_codigo_condominio.classList.add("input-erro");
        erro_codigo_condominio.innerHTML = "Digite o código do seu condomínio.";
    }
    else if (verifica_contem_letras(codigo_condominio)){
        label_codigo_condominio.classList.add("text-danger");
        input_codigo_condominio.classList.add("input-erro");
        erro_codigo_condominio.innerHTML = "O código deve conter apenas números.";
    }
    else if (codigo_condominio.length < 6){
        label_codigo_condominio.classList.add("text-danger");
        input_codigo_condominio.classList.add("input-erro");
        erro_codigo_condominio.innerHTML = "Digite um código de 6 dígitos válido.";
    }
    else{
        label_codigo_condominio.classList.remove("text-danger");
        input_codigo_condominio.classList.remove("input-erro");
        erro_codigo_condominio.innerHTML = '';
    }
    
}

function verificar_ponto_cpf_cnpj(lista){ // verifica se há algum ponto final (.) na string de cpf / cnpj, retorna true caso não haja nenhum ponto, retorna false caso encontre algum.
    let sem_ponto = true;
    for (let i = 0; i < lista.length; i++){
        if (lista[i] == '.'){
            sem_ponto = false;
        }
    }
    return sem_ponto;
}

function validacao_recuperar_senha(){
    // elementos da tela
    let label_email = document.getElementById("label_email");
    let input_email = document.getElementById("input_email");
    let erro = document.getElementById("erro_recuperar_senha_email");

    // dados dos elementos
    let email = input_email.value;

    // verifica se os dados foram preenchidos corretamente
    if (email.match(arroba) != null && email.match(final_email) != null){
        alert("Cheque sua caixa de email para alterar sua senha.");
        window.location.href = "./login.php";
    }
    else{
        label_email.classList.add("text-danger");
        input_email.classList.add("input-erro");
        erro.innerHTML = "Insira um email válido.";
    }
}

function verifica_contem_letras(string){
    let er = /^[0-9]+$/; // expressao regular que verifica se há numeros na string
    contem_letras = false;

    for (i = 0; i < string.length; i++){
        if (!er.test(string[i])) { // testa se a string é número e inverte o operador lógico
            contem_letras = true;
        }
    }
    return contem_letras;
  }
