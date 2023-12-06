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

$consulta = $db_con->prepare("SELECT * FROM usuario where cpf = '$cpf'");

if ($consulta->execute()) {
  $linha = $consulta->fetch(PDO::FETCH_ASSOC);
    $perfil["cpf"] = $linha["cpf"];
    $perfil["nome"] = $linha["nome"];
    $perfil["email"] = $linha["email"];
    $perfil["codigo_nivel_permissao"] = $linha["fk_nivel_permissao_codigo_nivel_permissao"];
    $perfil["codigo_condominio"] = $linha["fk_condominio_codigo_condominio"];
    $perfil["senha"] = $linha["senha"];
   $codigo_moradia = $linha["fk_moradia_codigo_moradia"];
    
    $consulta1 = $db_con->prepare("SELECT * FROM moradia where codigo_moradia = '$codigo_moradia'");
    $consulta1->execute();
    $linha1 = $consulta->fetch(PDO::FETCH_ASSOC);
    
    $perfil["num_moradia"] = $linha1["numero_moradia"];

   $codigo_divisao = $linha1["fk_divisao_codigo_divisao"];

    $consulta2 = $db_con->prepare("SELECT * FROM divisao where codigo_divisao = '$codigo_divisao'");
    $consulta2->execute();
    $linha2 = $consulta->fetch(PDO::FETCH_ASSOC);
    
    $perfil["divisao"] = $linha2["desc_divisao"];
   
    // Adiciona o produto no array de produtos.
   
  
  $perfil["sucesso"] = 1;
} else {
    // Caso ocorra falha no BD, o cliente 
    // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
    // motivo da falha.
    $perfil["sucesso"] = 0;
    $perfil["erro"] = "Erro no BD: " . $consulta->error;
}

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($perfil);
?>
