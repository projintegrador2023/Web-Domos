<?php
//Iniciar  Sessão se a sessão não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//Classe de cliente
include_once '30_DB_Cliente.php';


//verifica se o botão editar foi acionado
if(isset($_POST['btn-editar'])):

	//sanitiza os campos do formulário
	$nome=filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$sobrenome=filter_var($_POST['sobrenome'], FILTER_SANITIZE_STRING);
	$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$idade=filter_var($_POST['idade'], FILTER_SANITIZE_NUMBER_INT);
	$id =filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); 
	
	
	//instancia o objeto cliente
	$cliente = new Cliente();	
	$cliente->setNome($nome);
	$cliente->setSobrenome($sobrenome);
	$cliente->setEmail($email);
	$cliente->setIdade($idade);
	
	
	//atualiza o cliente
	if($cliente->update($id)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: 30_consultar.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: 30_consultar.php');
	endif;
endif;	



?>