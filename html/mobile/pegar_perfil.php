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
$perfil = array();

if(autenticar($db_con)) {
 if (isset($_GET['cpf'])) {
  $cpf = $_GET['cpf'];
  $consulta = $db_con->prepare("SELECT * FROM usuario where cpf = '$cpf'");

  if ($consulta->execute()) {
    $linha = $consulta->fetch(PDO::FETCH_ASSOC);
   
    $perfil = array();
    $perfil["cpf"] = $linha["cpf"];
    $perfil["nome"] = $linha["nome"];
    $perfil["email"] = $linha["email"];
    $perfil["codigo_nivel_permissao"] = $linha["fk_nivel_permissao_codigo_nivel_permissao"];
    $codigo_moradia = $linha["fk_moradia_codigo_moradia"];
    $codigo_imagem = $linha["fk_imagem_codigo_imagem"];

    $consulta_imagem = $db_con->prepare("SELECT endereco_imagem FROM IMAGEM WHERE codigo_imagem = '$codigo_imagem'");
    $consulta_imagem->execute();
    $linhaimg = $consulta_imagem->fetch(PDO::FETCH_ASSOC);
    $linkimg = $linhaimg["endereco_imagem"];
    $perfil['imagem'] = $linkimg;
    
    $consulta1 = $db_con->prepare("SELECT * FROM moradia where codigo_moradia = '$codigo_moradia'");
    $consulta1->execute();
    $linha1 = $consulta1->fetch(PDO::FETCH_ASSOC);
    
    $perfil["num_moradia"] = $linha1["numero_moradia"];

    $codigo_divisao = $linha1["fk_divisao_codigo_divisao"];

    $consulta2 = $db_con->prepare("SELECT * FROM divisao where codigo_divisao = '$codigo_divisao'");
    $consulta2->execute();
    $linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
    
    $perfil["divisao"] = $linha2["desc_divisao"];
 
  
  $perfil["sucesso"] = 1;
} else {
    // Caso ocorra falha no BD, o cliente 
    // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
    // motivo da falha.
    $perfil["sucesso"] = 0;
    $perfil["erro"] = "Erro no BD: " . $consulta->error;
}
 }}
// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($perfil);
?>
