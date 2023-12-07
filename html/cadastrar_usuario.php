<?php
	//Classe de usuario
	require_once './db/30_DB_Usuario.php';
	$usuario = new Usuario();
	//verifica se o botao de trocar formulario foi acionado
	if (isset($_POST['submit1'])){
		//valida os dados do primeiro formulario
		if (!empty($_POST['nome_usuario']) && validaCPF(preg_replace( '/[^0-9]/', '', $_POST['cpf_usuario'])) && !empty($_POST['senha_usuario']) && !empty($_POST['conf_senha_usuario']) && valida_codigo_condominio($_POST['input_codigo_condominio'])){
			// setando os dados no objeto de usuario
            $usuario->setNome($_POST['nome_usuario']); 
			$usuario->setCpf(preg_replace( '/[^0-9]/', '', $_POST['cpf_usuario']));
			$usuario->setEmail($_POST['email_usuario']);
            $usuario->setCodigoCondominio($_POST['input_codigo_condominio']);
            $usuario->setNivelPermissao(3);

            if (strlen($_POST['senha_usuario']) >= 8 && $_POST['senha_usuario'] == $_POST['conf_senha_usuario']){
                $usuario->setSenha($_POST['senha_usuario']);
                if (!isset($_SESSION)){
                    session_start(); // inicia sessao para enviar o usuario semi preenchido pra proxima pagina
                    $_SESSION['usuario'] = $usuario;
                    header('Location: cadastrar_usuario2.php');
                }
            } else if (strlen($_POST['senha_usuario']) < 8){
                echo '<script>
                    alert("A senha deve ter mais de 8 caracteres.");
                </script>';
            } else {
                echo '<script>
                    alert("As senhas não coincidem.");
                </script>';
            }
			 
		}
	}
	function validaCPF($cpf) {
        
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }

	function valida_codigo_condominio($codigo_condominio){
		$sql = 'SELECT * FROM CONDOMINIO WHERE codigo_condominio = :codigo_condominio';
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':codigo_condominio', $codigo_condominio);
        $stmt->execute();
        return $stmt->rowCount() > 0;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <script src="js/script.js" defer></script>
    <script src="js/formulario.js" defer></script>
    <title> Cadastro do morador - Domos </title>
</head>

<body>
    <div class="fundo-imagem pb-5">
    <?php include('header.php'); ?>
        <!-- formulário de cadastro de usuário -->
        <section class="mx-auto mt-4 col-12 col-sm-8 col-lg-7 col-xl-5 d-block">
            <form class="" action="" method="POST">
                <div class="formulario mx-3 px-5 py-4" id="div_cadastro_morador">
                    
                    <h1 class="color-0491a3 fs-2 mb-4 mt-3 text-center"> Cadastro do Morador </h1>
                    <label id="label_nome_usuario" for="nome_usuario" class="fs-5 color-0491a3"> Nome*</label>
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="nome_usuario" name="nome_usuario" type="text" required maxlength="45"><br>
                    <p id="erro_nome_usuario" class="fs-6 text-danger"></p>
                    <label id="label_cpf_usuario" for="cpf_usuario" class="fs-5 color-0491a3"> Cpf*</label> 
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="cpf_usuario" name="cpf_usuario" type="number" required><br>
                    <p id="erro_cpf_usuario" class="fs-6 text-danger"></p>
                    <label id="label_email_usuario" for="email_usuario" class="fs-5 color-0491a3"> E-mail*</label> 
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="email_usuario" name="email_usuario" type="email" required><br>
                    <p id="erro_email_usuario" class="fs-6 text-danger"></p>
                    <label id="label_senha_usuario" for="senha_usuario" class="fs-5 color-0491a3"> Crie sua senha*</label> 
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="senha_usuario" name="senha_usuario" type="password" required> <br>
                    <p id="erro_senha_usuario" class="fs-6 text-danger"></p>
                    <label id="label_conf_senha_usuario" for="conf_senha_usuario" class="fs-5 color-0491a3"> Confirme sua senha*</label> 
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="conf_senha_usuario" name="conf_senha_usuario" type="password" required><br>
                    <p id="erro_conf_senha_usuario" class="fs-6 text-danger"></p>

                    <div class="my-3">
                        <label for="input_codigo_condominio" id="label_codigo_condominio" class="fs-5 color-0491a3"> Código do condomínio*</label>
                        <input id="input_codigo_condominio" name="input_codigo_condominio" class="bg-e8e8e8 col-12 fs-5 input-form" type="number" maxlength="6" required>  <br>
                        <p id="erro_codigo_condominio" class="fs-6 text-danger"></p>
                    </div>

                    <div class="text-end col-12 pt-4">
                        <input type="submit" value="Continuar" name="submit1" class="bg-005661 color-fff p-2 rounded border-0 col-12 col-md-6 col-xxl-3 hover-0491a3">
                    </div>
                </div>
            </form>
            </div>         
        </section>

        <!-- Rodapé da página --> 
        <?php 
            include('footer.php');
        ?>
    </div>
</body>
</html>
