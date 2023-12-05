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
  $codigo_condominio = $_GET['codigo_condominio'];
  $importancia = $_GET['importancia'];
	 
  $consulta1 = $db_con->prepare("SELECT codigo_condominio FROM usuario where cpf = '$_GET['cpf']'");
  $consulta1->execute();
  $linha1 = $consulta1->fetch(PDO::FETCH_ASSOC);

$consulta = $db_con->prepare("SELECT * FROM aviso where fk_condominio_codigo_condominio = '$linha1['codigo_condominio']'");

if ($consulta->execute()) {
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $aviso = array();
    $aviso["codigo_postagem"] = $linha["codigo_postagem"];
    $aviso["data_hora_postagem"] = $linha["data_hora_postagem"];
    $aviso["titulo"] = $linha["titulo"];
    $aviso["descricao"] = $linha["descricao"];
    $aviso["cpf"] = $linha["fk_usuario_cpf"];
    
    $consulta2 = $db_con->prepare("SELECT desc_importancia FROM importancia where codigo_importancia = '$linha["fk_importancia_codigo_importancia"]'");
    $consulta2->execute();
    $linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
    
    $aviso["importancia"] = $linha2["desc_importancia"];
   
    // Adiciona o produto no array de produtos.
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

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>
