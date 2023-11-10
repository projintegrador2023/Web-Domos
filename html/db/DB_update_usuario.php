<?php 
    require_once("30_DB_Usuario.php");
    include("../iniciar_sessao.php");
    $usuario = new Usuario();
    $dados = $usuario->find($_POST['id']);
    if (isset($_POST['salvar'])){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $conf_senha = $_POST['conf_senha'];
        $email = $_POST['email'];
        if ($senha == $conf_senha){
            $usuario->setCpf($_POST['id']);
            $usuario->setNome($nome);
            $usuario->setSenha($senha);
            $usuario->setEmail($email);
            $usuario->setCodigoCondominio($dados[4]);
            $usuario->setNivelPermissao(3);

            $usuario->update($_POST['id']);
        }
    }

    function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
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
?>