<?php
//Classe de usuario
include_once '30_DB_usuario.php';

//verifica se o botão cadastrar foi acionado
if(isset($_POST['botao_cadastrar'])):
	
	//sanitiza os campos do formulário
	$nome=filter_var($_POST['nome_usuario'], FILTER_SANITIZE_STRING);
	$cpf = $_POST['cpf_usuario'];
	$email=filter_var($_POST['email_usuario'], FILTER_SANITIZE_EMAIL);
	$senha = $_POST['senha_usuario'];
	$conf_senha = $_POST['conf_senha_usuario'];
	$codigo_condominio = $_POST['input_codigo_condominio'];
	$nivel_permissao = 3;


	//instancia o usuario
	$usuario = new Usuario();	
	
	//informa os dados do usuario
	$usuario->setNome($nome);
	$usuario->setCpf($cpf);
	$usuario->setEmail($email);
	$usuario->setSenha($senha);
	$usuario->setCodigoCondominio($codigo_condominio);
	$usuario->setNivelPermissao($nivel_permissao);
	$usuario->setCodigoMoradia(null);
	
	//insere o usuario
	if($usuario->insert()):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../login.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: ../index.php');
	endif;
endif;	



?>