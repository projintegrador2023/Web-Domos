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
 if (isset($_GET['limit']) && isset($_GET['offset']) && isset($_GET['cpf'])) {
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];
    $cpf = $_GET['cpf'];
		
			$consulta = $db_con->prepare("SELECT * FROM anuncio where fk_usuario_cpf = '$cpf'");
     if ($consulta->execute()) {
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
       $anuncio = array();
       $anuncio["codigo_postagem"] = $linha["codigo_postagem"];
       $anuncio["data_hora_postagem"] = $linha["data_hora_postagem"];
       $anuncio["titulo"] = $linha["titulo"];
       $anuncio["descricao"] = $linha["descricao"];
        $codigo_tag = $linha["fk_tag_codigo_tag"];
        
          $consulta1 = $db_con->prepare("SELECT * FROM tag where codigo_tag = '$codigo_tag'");
	$consulta1->execute();
        $linha1 = $consulta1->fetch(PDO::FETCH_ASSOC);
          $anuncio["tag"] = $linha1["desc_tag"};

	$consulta2 = $db_con->prepare("SELECT * FROM usuario where cpf = '$cpf'");
	$consulta2->execute();
        $linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
	      $anuncio["nome"] = $linha2["nome"];
        
	      $codigo_moradia = $linha2["fk_moradia_codigo_moradia"];
	      
	$consulta3 = $db_con->prepare("SELECT * FROM moradia where codigo_moradia = '$codigo_moradia'");
    	$consulta3->execute();
    	$linha3 = $consulta3->fetch(PDO::FETCH_ASSOC);

   	 $anuncio["num_moradia"] = $linha3["numero_moradia"];

   	$codigo_divisao = $linha3["fk_divisao_codigo_divisao"];

    $consulta4 = $db_con->prepare("SELECT * FROM divisao where codigo_divisao = '$codigo_divisao'");
    $consulta4>execute();
    $linha4 = $consulta4->fetch(PDO::FETCH_ASSOC);

    $anuncio["divisao"] = $linha4["desc_divisao"];
	      
       
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
