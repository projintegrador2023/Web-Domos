<?php
 
/*
 * O código abaixo registra um novo usuário.
 * Método do tipo POST.
 */

require_once('conexao_db.php');

// array de resposta
$resposta = array();
 
// verifica se todos os campos necessários foram enviados ao servidor
if (isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['codigo_condominio']) && isset($_POST['numero_apartamento']) && isset($_POST['divisao'])) {
 
    // o método trim elimina caracteres especiais/ocultos da string
	$cpf = trim($_POST['cpf']);
	$nome = trim($_POST['nome']);
	$email = trim($_POST['email']);
	$senha = trim($_POST['senha']);
	$codigo_condominio = trim($_POST['codigo_condominio']);
	$numero_apartamento = trim($_POST['numero_apartamento']);
	$divisao = trim($_POST['divisao']);
	// o bd não armazena diretamente a senha do usuário, mas sim 
	// um código hash que é gerado a partir da senha.
	$token = password_hash($senha, PASSWORD_DEFAULT);
	
	$sql_bloco = $db_con->prepare("SELECT codigo_divisao FROM DIVISAO WHERE desc_divisao = '$divisao' AND fk_condominio_codigo_condominio = '$codigo_condominio'");
	$sql_bloco->execute();
	$sql_moradia = $db_con->prepare("SELECT codigo_moradia FROM MORADIA WHERE numero_moradia = '$numero_apartamento' AND fk_divisao_codigo_divisao = '$sql_bloco'");
	$sql_moradia->execute();
	
	// antes de registrar o novo usuário, verificamos se ele já
	// não existe.
	$consulta_usuario_existe = $db_con->prepare("SELECT cpf FROM usuario WHERE cpf='$cpf'");
	$consulta_usuario_existe->execute();
	if ($consulta_usuario_existe->rowCount() > 0) { 
		// se já existe um usuario para login
		// indicamos que a operação não teve sucesso e o motivo
		// no campo de erro.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "usuario ja cadastrado";
	}
	else {
		// se o usuário ainda não existe, inserimos ele no bd.
		$consulta = $db_con->prepare("INSERT INTO usuario(cpf, nome, email, senha, fk_condominio_codigo_condominio, fk_nivel_permissao_codigo_nivel_permissao, fk_imagem_codigo_imagem, fk_moradia_codigo_moradia) 
											VALUES('$cpf', '$nome', '$email', '$token', '$codigo_condominio',  3, null, '$sql_moradia')");
	 
		if ($consulta->execute()) {
			// se a consulta deu certo, indicamos sucesso na operação.
			$resposta["sucesso"] = 1;
		}
		else {
			// se houve erro na consulta, indicamos que não houve sucesso
			// na operação e o motivo no campo de erro.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "erro BD: " . $consulta->error;
		}
	}
}
else {
	// se não foram enviados todos os parâmetros para o servidor, 
	// indicamos que não houve sucesso
	// na operação e o motivo no campo de erro.
    $resposta["sucesso"] = 0;
	$resposta["erro"] = "faltam parametros";
}

// A conexão com o bd sempre tem que ser fechada
$db_con = null;

// converte o array de resposta em uma string no formato JSON e 
// imprime na tela.
echo json_encode($resposta);
?>
