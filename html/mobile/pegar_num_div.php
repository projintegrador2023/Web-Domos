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
 
// Verifica se o parametro id foi enviado na requisicao
if (isset($_GET["codigo_condominio"])) {
    
    // Aqui sao obtidos os parametros
    $id = intval($_GET['codigo_condominio']);
    
    // Obtem do BD os detalhes do produto com id especificado na requisicao GET
    $consulta = $db_con->prepare("SELECT numero_moradia FROM MORADIA WHERE fk_condominio_codigo_condominio = $id");
    
    if ($consulta->execute()) {
        if ($consulta->rowCount() > 0) {
    
            // Se o produto existe, os dados completos do produto 
            // sao adicionados no array de resposta. A imagem nao 
            // e entregue agora pois ha um php exclusivo para obter 
            // a imagem do produto.
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $numero = array();
				$numero["num"] = $linha["numero_moradia"];
			 
				// Adiciona o produto no array de produtos.
				array_push($resposta["numeros"], $numero);
            }

                // Obtem do BD os detalhes do produto com id especificado na requisicao GET
            $consulta1 = $db_con->prepare("SELECT desc_divisao FROM divisao WHERE fk_condominio_codigo_condominio = $id");
        
            if ($consulta1->execute()) {
                if ($consulta1->rowCount() > 0) {
            
                    // Se o produto existe, os dados completos do produto 
                    // sao adicionados no array de resposta. A imagem nao 
                    // e entregue agora pois ha um php exclusivo para obter 
                    // a imagem do produto.
                    while ($linha = $consulta1->fetch(PDO::FETCH_ASSOC)) {
                        $div = array();
                        $div["div"] = $linha["desc_divisao"];
                    
                        // Adiciona o produto no array de produtos.
                        array_push($resposta["divs"], $div);
                    }

                    $resposta["sucesso"] = 1;

                } else {
                    // Caso o produto nao exista no BD, o cliente 
                    // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
                    // motivo da falha.
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "O condomínio não contém divisões";
                }
            } else {
                // Caso ocorra falha no BD, o cliente 
                // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
                // motivo da falha.
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Erro no BD: " . $consulta1->error;
            }
        } else {
            // Caso o produto nao exista no BD, o cliente 
            // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
            // motivo da falha.
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "O condomínio não contém números";
        }
    } else {
        // Caso ocorra falha no BD, o cliente 
        // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
        // motivo da falha.
        $resposta["sucesso"] = 0;
        $resposta["erro"] = "Erro no BD: " . $consulta->error;
    }
} else {
    // Se a requisicao foi feita incorretamente, ou seja, os parametros 
    // nao foram enviados corretamente para o servidor, o cliente 
    // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
    // motivo da falha.
    $resposta["sucesso"] = 0;
    $resposta["erro"] = "Campo requerido não preenchido";
}


// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>