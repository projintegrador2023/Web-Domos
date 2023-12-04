<?php
 
/*
 * O codigo seguinte retorna os dados detalhados de um produto.
 * Essa e uma requisicao do tipo GET. Um produto e identificado 
 * pelo campo id.
 */

// conexão com bd
require_once('conexao_db.php');

// array de resposta
$resposta = array();
$resposta["anuncios"] = array();

$consulta = $db_con->prepare("SELECT * FROM anuncio where fk_condominio_codigo_condominio = '$codigo_condominio'");

if ($consulta->execute()) {
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $anuncio = array();
    $anuncio["data_hora_postagem"] = $linha["data_hora_postagem"];
    $anuncio["titulo"] = $linha["titulo"];
    $anuncio["descricao"] = $linha["descricao"];
    $anuncio["cpf"] = $linha["fk_usuario_cpf"];
    
    $consulta1 = $db_con->prepare("SELECT desc_tag FROM tag where codigo_tag = '$linha["fk_tag_codigo_tag"]'");
    $consulta1->execute();
    $linha1 = $consulta->fetch(PDO::FETCH_ASSOC);
    
    $anuncio["tag"] = $linha1["desc_tag"];
   
    // Adiciona o produto no array de produtos.
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

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>
