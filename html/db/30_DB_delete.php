<?php
//Se a sessão não existir, então inicia a sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//Classe de cliente
include_once '30_DB_Cliente.php';


//verifica se o botão deletar foi acionado
if(isset($_POST['btn-deletar'])):
	//sanitiza o id passado por parâmetro e enviado pela requisição HTTP POST
	$id =filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); 	
	
	
	//instancia um objeto cliente
	$cliente = new Cliente();	
	
	
	//exclui o cliente
	if($cliente->delete($id)):
		$_SESSION['mensagem'] = "Excluido com sucesso!";
		header('Location: 30_consultar.php');
	else:
		$_SESSION['mensagem'] = "Erro ao excluir!";
		header('Location: 30_consultar.php');
	endif;
	
endif;	



?>