<?php
 
/*
 * O código abaixo registra um novo usuário.
 * Método do tipo POST.
 */
require_once('../db/DB_Anuncio.php');
require_once('conexao_db.php');

// array de resposta
$resposta = array();
 
// verifica se todos os campos necessários foram enviados ao servidor
if (isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
 
    // o método trim elimina caracteres especiais/ocultos da string
	$cpf = trim($_POST['cpf']);
	$nome = trim($_POST['nome']);
	$email = trim($_POST['email']);
	$senha = trim($_POST['senha']);
	// o bd não armazena diretamente a senha do usuário, mas sim 
	// um código hash que é gerado a partir da senha.
	$token = password_hash($senha, PASSWORD_DEFAULT);
  $codigo_img = '';
		if (isset($_FILES['file']['name'])){
			$client_id = "b8c02929102d33d";
			$statusMsg = $valErr = '';
			$status = 'danger';
			$imgurData = array();

			$filename = basename($_FILES['file']['name']);
            $filetype = pathinfo($filename, PATHINFO_EXTENSION);

            
            $image_source = file_get_contents($_FILES['file']['tmp_name']);
            $post_fields = array('image' => base64_encode($image_source));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image');
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID '. $client_id));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
            $response = curl_exec($ch);
            if ($response === false) {
                echo 'Erro cURL: ' . curl_error($ch);
            }
            curl_close($ch);
    
            $responseArr = json_decode($response);
            
            if (!empty($responseArr->data->link)){
              $imgurData = $responseArr;
              
              $status = 'success';
              $statusMsg = 'Imagem enviada para o Imgur com sucesso';
    
              $imglink = $imgurData->data->link;
			  $sql = "INSERT INTO IMAGEM (endereco_imagem) VALUES (:imagem)
                RETURNING codigo_imagem";
				$stmt = Database::prepare($sql);
				$stmt->bindParam(":imagem", $imglink);
				$stmt->execute();
				$dados = $stmt->fetch(PDO::FETCH_BOTH);
				$codigo_img = $dados[0];
            } else {
                $statusMsg = 'Erro ao enviar imagem, tente novamente em instantes.';
            }
		}
  if (!empty($codigo_img)){
    $consulta = $db_con->prepare("INSERT INTO usuario(cpf, nome, email, senha, fk_imagem_codigo_imagem) 
											VALUES('$cpf', '$nome', '$email', '$token', '$codigo_img')");
  } else {
    $consulta = $db_con->prepare("INSERT INTO usuario(cpf, nome, email, senha) 
											VALUES('$cpf', '$nome', '$email', '$token')");
  }
		
	 
		if ($consulta->execute()) {
			// se a consulta deu certo, indicamos sucesso na operação.
			$resposta["sucesso"] = 1;
		}
		else {
			// se houve erro na consulta, indicamos que não houve sucesso
			// na operação e o motivo no campo de erro.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "erro BD: " . $consulta->error;
		}
}
else {
	// se não foram enviados todos os parâmetros para o servidor, 
	// indicamos que não houve sucesso
	// na operação e o motivo no campo de erro.
    $resposta["sucesso"] = 0;
	$resposta["erro"] = "faltam parametros";
}

// A conexão com o bd sempre tem que ser fechada
$db_con = null;

// converte o array de resposta em uma string no formato JSON e 
// imprime na tela.
echo json_encode($resposta);
?>
