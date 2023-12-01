<?php
 
/*
 * O seguinte codigo abre uma conexao com o BD e adiciona um produto nele.
 * As informacoes de um produto sao recebidas atraves de uma requisicao POST.
 */

// conexão com bd
require_once('conexao_db.php');

// autenticação
require_once('autenticacao.php');

// array de resposta
$resposta = array();

// verifica se o usuário conseguiu autenticar
if(autenticar($db_con)) {
	
	if (isset($_POST['titulo']) && isset($_POST['tag']) && isset($_POST['descricao']) && isset($_POST['cpf'])) {
		
		// Aqui sao obtidos os parametros
		$titulo = $_POST['titulo'];
		$tag = $_POST['tag'];
		$descricao = $_POST['descricao'];
		$cpf = $_POST['cpf'];

		$timezone = new DateTimeZone('America/Sao_Paulo');
    $data_hora = new DateTime('now', $timezone);
    $data_hora_formatada = $data_hora->format('Y-m-d H:i:s');

		$sql_tag = $db_con->prepare("SELECT codigo_tag FROM importancia WHERE desc_tag = '$tag'");
		$sql_tag->execute();
		$codigo_tag = $sql_tag->fetch(PDO::FETCH_ASSOC);
		$tag = $codigo_tag['codigo_tag'];

		$sql_condominio = $db_con->prepare("SELECT fk_condominio_codigo_condominio FROM usuario WHERE cpf = '$cpf'");
		$sql_condominio->execute();
		$condominio = $sql_condominio->fetch(PDO::FETCH_ASSOC);
		$codigo_condominio = $condominio['fk_condominio_codigo_condominio'];

		// A proxima linha insere um novo produto no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.
		
		$consulta = $db_con->prepare("INSERT INTO anuncio(data_hora_postagem, descricao, titulo, fk_usuario_cpf, fk_tag_codigo_tag, fk_condominio_codigo_condominio) VALUES('$data_hora_formatada', '$descricao', '$titulo', '$cpf','$importancia', '$codigo_condominio')");
		if ($consulta->execute()) {
			// Se o produto foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 1
			$resposta["sucesso"] = 1;
		} else {
			// Se o produto nao foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao criar produto no BD: " . $consulta->error;
		}
	} else {
		// Se a requisicao foi feita incorretamente, ou seja, os parametros 
		// nao foram enviados corretamente para o servidor, o cliente 
		// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		// motivo da falha.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Campo requerido nao preenchido";
	}
}
else {
	// senha ou usuario nao confere
	$resposta["sucesso"] = 0;
	$resposta["erro"] = "usuario ou senha não confere";
}

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>
