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
$resposta["anuncios"] = array();

if(autenticar($db_con)) {
 if (isset($_GET['limit']) && isset($_GET['offset']) && isset($_GET['cpf']) && isset($_GET['tag'])) {
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];
    $cpf = $_GET['cpf'];
    $tag = $_GET['tag'];
		
		  $consulta1 = $db_con->prepare("SELECT fk_condominio_codigo_condominio FROM usuario where cpf = '$cpf'");
		  $consulta1->execute();
		  $linha1 = $consulta1->fetch(PDO::FETCH_ASSOC);
		  $codigo_condominio = $linha1['fk_condominio_codigo_condominio'];
	 
	 $consulta = null;
		 if ($tag === "Todos") {
			$consulta = $db_con->prepare("SELECT * FROM anuncio where fk_condominio_codigo_condominio = '$codigo_condominio'");
		} else {
			 $consulta2 = $db_con->prepare("SELECT codigo_tag FROM tag where desc_tag = '$tag'");
		 	 $consulta2->execute();
		  	$linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
		  	$codigo_tag = $linha2['codigo_tag'];
			$consulta = $db_con->prepare("SELECT * FROM anuncio where fk_condominio_codigo_condominio = '$codigo_condominio' AND fk_tag_codigo_tag = '$codigo_tag'");
		}
     if ($consulta->execute()) {
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
       $anuncio = array();
       $anuncio["codigo_postagem"] = $linha["codigo_postagem"];
       $anuncio["data_hora_postagem"] = $linha["data_hora_postagem"];
       $anuncio["titulo"] = $linha["titulo"];
       $anuncio["descricao"] = $linha["descricao"];
      $anuncio["imagem"] = '';
	      $anuncio["tag"] =  $linha["fk_tag_codigo_tag"];
       $codigo_imagem = $linha["fk_imagem_codigo_imagem"];
      if (!empty($codigo_imagem)){
	      	$consulta_imagem = $db_con->prepare("SELECT endereco_imagem FROM IMAGEM WHERE codigo_imagem = '$codigo_imagem'");
	 	$consulta_imagem->execute();
	 	$linhaimg = $consulta_imagem->fetch(PDO::FETCH_ASSOC);
 		$linkimg = $linhaimg["endereco_imagem"];
		$anuncio['imagem'] = $linkimg;
      }

       

	      $cpf = $linha["fk_usuario_cpf"];
	$consulta3 = $db_con->prepare("SELECT * FROM usuario where cpf = '$cpf'");
	$consulta3->execute();
        $linha3 = $consulta3->fetch(PDO::FETCH_ASSOC);
	      
	      $codigo_moradia = $linha3["fk_moradia_codigo_moradia"];
	      $anuncio["nome"] = $linha3["nome"];
	      

	$consulta4 = $db_con->prepare("SELECT * FROM moradia where codigo_moradia = '$codigo_moradia'");
    	$consulta4->execute();
    	$linha4 = $consulta4->fetch(PDO::FETCH_ASSOC);

   	 $anuncio["num_moradia"] = $linha4["numero_moradia"];

   	$codigo_divisao = $linha4["fk_divisao_codigo_divisao"];

    $consulta5 = $db_con->prepare("SELECT * FROM divisao where codigo_divisao = '$codigo_divisao'");
    $consulta5->execute();
    $linha5 = $consulta5->fetch(PDO::FETCH_ASSOC);

    $anuncio["divisao"] = $linha5["desc_divisao"];
	      

       array_push($resposta["anuncios"], $anuncio);
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
