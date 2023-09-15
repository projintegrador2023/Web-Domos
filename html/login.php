<?php 
    $_ERRO_LOGIN = 0;

    if (isset($_POST['cpf_cnpj']) || isset($_POST['senha_login'])){
        if (strlen($_POST['cpf_cnpj']) == 0 && strlen($_POST['senha_login']) == 0){
            $_ERRO_LOGIN = 1;
        } else if (strlen($_POST['cpf_cnpj']) == 0 && strlen($_POST['senha_login']) != 0){
            $_ERRO_LOGIN = 2;
        } else if (strlen($_POST['cpf_cnpj']) != 0 && strlen($_POST['senha_login']) == 0){
            $_ERRO_LOGIN = 3;
        } else if (strlen($_POST['cpf_cnpj']) != 0 && strlen($_POST['senha_login']) != 0 && !validaCPF($_POST['cpf_cnpj']) && !validar_cnpj($_POST['cpf_cnpj'])){
            $_ERRO_LOGIN = 4;
        } else if(validaCPF($_POST['cpf_cnpj']) || validar_cnpj($_POST['cpf_cnpj'])){
            $_ERRO_LOGIN = 0;   
            if (!isset($_SESSION)){
                session_start();
            }
    
            $_SESSION['id'] = filter_var($_POST['cpf_cnpj'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['senha'] = $_POST['senha_login'];
    
            header("Location: avisos.php");
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

    function validar_cnpj($cnpj)
{
    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
    
    // Valida tamanho
    if (strlen($cnpj) != 14)
        return false;

    // Verifica se todos os digitos são iguais
    if (preg_match('/(\d)\1{13}/', $cnpj))
        return false;	

    // Valida primeiro dígito verificador
    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
    {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }

    $resto = $soma % 11;

    if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
        return false;

    // Valida segundo dígito verificador
    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
    {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }

    $resto = $soma % 11;

    return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <script src="js/script.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Login - Domos </title>
</head>

<body>
    <div class="fundo-imagem pb-5">
        <?php include('header.php'); ?>
        
        <!-- Formulário de login --> 
        <div class="d-block m-auto col-8 col-md-6 col-lg-5 col-xl-4 p-5 rborder4 formulario">
            <section class="color-0491a3">
                <h1 class="text-center fs-1"> Login </h1>
            </section> <br>
            
            <form method="POST" action=""> 
                <label class="fs-5 color-0491a3" id="label_cpf_cnpj" name="label_cpf_cnpj" for="cpf_cnpj"> CPF / CNPJ </label>
                <input class="bg-e8e8e8 col-12 fs-4 input-form" name="cpf_cnpj" id="cpf_cnpj" type="text"> <br>

                <?php 
                    if ($_ERRO_LOGIN == 1){
                        echo "<p class='text-danger fs-6 text-start mb-0'>Preencha seu CPF ou CNPJ</p>";
                    } else if ($_ERRO_LOGIN == 2){
                        echo "<p class='text-danger fs-6 text-start mb-0'>Preencha seu CPF ou CNPJ</p>";
                    } else if ($_ERRO_LOGIN == 4){
                        echo "<p class='text-danger fs-6 text-start mb-0'>Insira um CPF ou CNPJ válido</p>";
                    }
                ?>

                <label class="fs-5 color-0491a3 mt-4" id="label_senha" for="senha_login"> Senha </label>
                <input class="bg-e8e8e8 col-12 fs-4 input-form" id="senha_login" name="senha_login" type="password"> <br>
                <?php
                    if ($_ERRO_LOGIN == 1){
                        echo "<p class='text-danger fs-6 text-start mb-0'>Preencha sua senha</p>";
                    } else if ($_ERRO_LOGIN == 3){
                        echo "<p class='text-danger fs-6 text-start mb-0'>Preencha sua senha</p>";
                    }
                ?>

                <p id="erro_login_senha" class="text-danger fs-6"></p>
                <div class="pe-2 text-end">
                <a href="recuperar_senha.php" class="color-0491a3"> Esqueceu sua senha? </a> <br> 
                </div> <br> 

                <!-- Botão de entrar com validação -->
                <div class="text-end">
                    <a href="avisos.php"><input type="submit" value="Entrar" class="bg-005661 color-fff p-2 rounded border-0 col-12 col-md-6 col-xxl-3 hover-0491a3"></input></a>
                </div>  
            </form>  
        </div>
        <br> <br> 
        <?php include('footer.php'); ?>
</body>
</html>