<?php
	//Classe de usuario
	include_once '30_DB_usuario.php';
	$usuario = new Usuario();
	//verifica se o botao de trocar formulario foi acionado
	if (isset($_POST['submit1'])){
		//valida os dados do primeiro formulario
		if (validacao_nome($_POST['nome_usuario']) && validaCPF(preg_replace( '/[^0-9]/', '', $_POST['cpf_usuario'])) && $_POST['senha_usuario'] == $_POST['conf_senha_usuario'] && valida_codigo_condominio($_POST['input_codigo_condominio'])){
			$usuario->setNome($_POST['nome_usuario']); 
			$usuario->setCpf(preg_replace( '/[^0-9]/', '', $_POST['cpf_usuario']));
			$usuario->setEmail($_POST['email_usuario']);
			$usuario->setSenha($_POST['senha_usuario']);
			$usuario->setCodigoCondominio($_POST['input_codigo_condominio']);
			$usuario->setNivelPermissao(3);
		}
	}
	//verifica se o botão cadastrar foi acionado
	if(isset($_POST['botao_cadastrar'])){
		$usuario->setCodigoMoradia(null);

		//insere o usuario
		if($usuario->insert()){
			if (!isset($_SESSION)){
				session_start();
				$_SESSION['id'] = $usuario->getCpf();
				$_SESSION['tipo_usuario'] = 1;
				header("Location: ../avisos.php");
			}
		} else{
			header('Location: ../index.php');
		}
	}

	function validacao_nome($nome){
		if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)){
			echo "<script> 
			alert('O nome contém caracteres inválidos');
			</script>";
			return false;
		} 
		return true;
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
		return true;
	}
?>