<?php
 
/*
 * O codigo seguinte retorna os dados detalhados de um produto.
 * Essa e uma requisicao do tipo GET. Um produto e identificado 
 * pelo campo id.
 */

// conexão com bd
require_once('conexao_db.php');
require_once('autenticacao.php');

// array de resposta
$resposta = array();
$resposta["avisos"] = array();

// verifica se o usuário conseguiu autenticar
if(autenticar($db_con)) {
	 if (isset($_GET['limit']) && isset($_GET['offset']) && isset($_GET['cpf']) && isset($_GET['importancia'])) {
		  $limit = $_GET['limit'];
		  $offset = $_GET['offset'];
		  $cpf = $_GET['cpf'];
		  $importancia = $_GET['importancia'];
		
		  $consulta1 = $db_con->prepare("SELECT fk_condominio_codigo_condominio FROM usuario where cpf = '$cpf'");
		  $consulta1->execute();
		  $linha1 = $consulta1->fetch(PDO::FETCH_ASSOC);
		  $codigo_condominio = $linha1['fk_condominio_codigo_condominio'];
		 

  		  

		 $consulta = null;
		 if ($importancia === "Todos") {
			$consulta = $db_con->prepare("SELECT * FROM aviso where fk_condominio_codigo_condominio = '$codigo_condominio'");
		} else {
			$consulta2 = $db_con->prepare("SELECT codigo_importancia FROM importancia where desc_importancia = '$importancia'");
		  	$consulta2->execute();
		  	$linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
		 	$codigo_importancia = $linha2['codigo_importancia'];
			$consulta = $db_con->prepare("SELECT * FROM aviso where fk_condominio_codigo_condominio = '$codigo_condominio' AND fk_importancia_codigo_importancia = '$codigo_importancia'");
		}
	
		
	
		if ($consulta->execute()) {
	  		while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	    		    $aviso = array();
			    $aviso["codigo_postagem"] = $linha["codigo_postagem"];
			    $aviso["data_hora_postagem"] = $linha["data_hora_postagem"];
			    $aviso["titulo"] = $linha["titulo"];
			    $aviso["descricao"] = $linha["descricao"];
			    $aviso["cpf"] = $linha["fk_usuario_cpf"];
			    $aviso["importancia"] = $linha["fk_importancia_codigo_importancia"];
			    array_push($resposta["avisos"], $aviso);
	  		}
	  
	  		$resposta["sucesso"] = 1;
		} else {
		    // Caso ocorra falha no BD, o cliente 
		    // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		    // motivo da falha.
		    $resposta["sucesso"] = 0;
		    $resposta["erro"] = "Erro no BD: " . $consulta->error;
		}
	}
}

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>
