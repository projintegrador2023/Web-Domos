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
$resposta["tags"] = array();

$consulta = $db_con->prepare("SELECT desc_tag FROM tag");

if ($consulta->execute()) {
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $tag = array();
    $tag["tag"] = $linha["desc_tag"];
   
    // Adiciona o produto no array de produtos.
    array_push($resposta["tags"], $tag);
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
