const div_cadastrar_condominio = document.getElementById("div_cadastro_condominio");
const div_cadastro_endereco = document.getElementById("div_cadastro_endereco");
const div_cadastro_informacoes = document.getElementById("div_cadastro_informacoes");
const div_cadastro_informacoes_opcionais = document.getElementById("div_cadastro_informacoes_opcionais");
const div_cadastro_morador = document.getElementById("div_cadastro_morador");
const div_informacoes_condominio = document.getElementById("div_informacoes_condominio");
const d_block = "d-block";
const d_none = "d-none";

function trocar_formulario(){
   if(is_visible(div_cadastrar_condominio.classList)){
        hide(div_cadastrar_condominio);
        show(div_cadastro_endereco);
   }
   else if(is_visible(div_cadastro_endereco.classList)){
		hide(div_cadastro_endereco);
		show(div_cadastro_informacoes);
   }
   else if(is_visible(div_cadastro_informacoes.classList)){
		hide(div_cadastro_informacoes);
		show(div_cadastro_informacoes_opcionais);
   }
}

function voltar_formulario(){
	if(is_visible(div_cadastro_endereco.classList)){
        hide(div_cadastro_endereco);
        show(div_cadastrar_condominio);
   }
   else if(is_visible(div_cadastro_informacoes.classList)){
		hide(div_cadastro_informacoes);
		show(div_cadastro_endereco);
   }
   else if(is_visible(div_cadastro_informacoes_opcionais.classList)){
		hide(div_cadastro_informacoes_opcionais);
		show(div_cadastro_informacoes);
   }
}

function trocar_formulario_usuario(){
	hide(div_cadastro_morador);
	show(div_informacoes_condominio);
}

function voltar_formulario_usuario(){
	hide(div_informacoes_condominio);
	show(div_cadastro_morador);
}



function validacao_cadastro_condominio(){

}

function validacao_cadastro_endereco(){

}

function validacao_cadastro_informacoes(){

}

function is_visible(array){
    for (let i = 0; i < array.length; i++){
		if (array[i] == d_block){
			return true;
		}
	}
	return false;
}

function hide(div){
    div.classList.remove(d_block);
    div.classList.add(d_none);
}

function show(div){
    div.classList.remove(d_none);
    div.classList.add(d_block);
}
