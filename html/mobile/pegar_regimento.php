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
$regimento = array();

if(autenticar($db_con)) {
 if (isset($_GET['cpf'])) {
  $cpf = $_GET['cpf'];
  $consulta = $db_con->prepare("SELECT * FROM usuario where cpf = '$cpf'");

  if ($consulta->execute()) {
    $linha = $consulta->fetch(PDO::FETCH_ASSOC);
   
    $codigo_condominio = $linha["fk_condominio_codigo_condominio"];

    $consulta1 = $db_con->prepare("SELECT regimento FROM condominio where codigo_condominio = '$codigo_condominio'");
    $consulta1->execute();
    $linha1 = $consulta1->fetch(PDO::FETCH_ASSOC);
    
    $regimento["regimento"] = $linha1["regimento"];

  $regimento["sucesso"] = 1;
} else {
    // Caso ocorra falha no BD, o cliente 
    // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
    // motivo da falha.
    $regimento["sucesso"] = 0;
    $regimento["erro"] = "Erro no BD: " . $consulta->error;
}
 }}
// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($regimento);
?>
