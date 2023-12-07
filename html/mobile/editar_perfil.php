<?php
require_once('conexao_db.php');

// array de resposta
$resposta = array();
 
// verifica se todos os campos necessários foram enviados ao servidor
if (isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_FILES["imagem"]) && isset($_POST['senha']) && isset($_POST['codigo_condominio']) && isset($_POST['numero_apartamento']) && isset($_POST['divisao'])) {
 
    // o método trim elimina caracteres especiais/ocultos da string
	$cpf = trim($_POST['cpf']);
	$nome = trim($_POST['nome']);
	$email = trim($_POST['email']);
	$senha = trim($_POST['senha']);
	$codigo_condominio = trim($_POST['codigo_condominio']);
	$numero_apartamento = trim($_POST['numero_apartamento']);
	$divisao = trim($_POST['divisao']);
	// o bd não armazena diretamente a senha do usuário, mas sim 
	// um código hash que é gerado a partir da senha.
	$token = password_hash($senha, PASSWORD_DEFAULT);

  $filename = $_FILES['imagem']['tmp_name'];
	$client_id="ce5d3a656e2aa51";
	$handle = fopen($filename, "r");
	$data = fread($handle, filesize($filename));
	$pvars = array('image' => base64_encode($data));
	$timeout = 30;
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
	curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
	$out = curl_exec($curl);
	curl_close ($curl);
	$pms = json_decode($out,true);
	$img_url=$pms['data']['link'];


  $consulta_imagem = $db_con->prepare("INSERT INTO imagem (endereco_imagem) VALUES ('$img_url')");
  $consulta_imagem->execute();
  
  
	$sql_bloco = $db_con->prepare("SELECT codigo_divisao FROM DIVISAO WHERE desc_divisao = '$divisao' AND fk_condominio_codigo_condominio = '$codigo_condominio'");
	$sql_bloco->execute();
	$bloco = $sql_bloco->fetch(PDO::FETCH_ASSOC);
	$codigo_divisao = $bloco['codigo_divisao'];
	$sql_moradia = $db_con->prepare("SELECT codigo_moradia FROM MORADIA WHERE numero_moradia = '$numero_apartamento' AND fk_divisao_codigo_divisao = '$codigo_divisao'");
	$sql_moradia->execute();
	$moradia = $sql_moradia->fetch(PDO::FETCH_ASSOC);
	$codigo_moradia = $moradia['codigo_moradia'];
	
	// antes de registrar o novo usuário, verificamos se ele já
	// não existe.
	$consulta_usuario_existe = $db_con->prepare("SELECT cpf FROM usuario WHERE cpf='$cpf'");
	$consulta_usuario_existe->execute();
	if ($consulta_usuario_existe->rowCount() > 0) { 
		$consulta = $db_con->prepare("UPDATE usuario set nome = '$nome', email = '$email', senha = '$token', fk_condominio_codigo_condominio = '$codigo_condominio', fk_imagem_codigo_imagem, fk_moradia_codigo_moradia = '$codigo_moradia' where cpf = '$cpf'";
	 
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
		// se o usuário ainda não existe, inserimos ele no bd.
		
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
