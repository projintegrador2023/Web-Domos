<?php
//Classe de cliente
include_once '30_DB_Cliente.php';

//Se a sessão não existir, então inicia a sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}


//verifica se o botão cadastrar foi acionado
if(isset($_POST['btn-cadastrar'])):
	
	//sanitiza os campos do formulário
	$nome=filter_var($_POST['nome_usuario'], FILTER_SANITIZE_STRING);
	$cpf = $_POST['cpf_usuario'];
	$email=filter_var($_POST['email_usuario'], FILTER_SANITIZE_EMAIL);
	$senha = $_POST['senha_usuario'];
	$conf_senha = $_POST['conf_senha_usuario'];

	//instancia o cliente
	$cliente = new Cliente();	
	
	//informa os dados do cliente
	$cliente->setNome($nome);
	$cliente->setSobrenome($sobrenome);
	$cliente->setEmail($email);
	$cliente->setIdade($idade);
	$cliente->setTipoCliente(1);
	
	//insere o cliente
	if($cliente->insert()):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: 30_consultar.php?sucesso');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: 30_consultar?erro');
	endif;
endif;	



?>