<?php 
    include("iniciar_sessao.php");
    require_once("db/30_DB_Usuario.php");
    $usuario = new Usuario();
    $dados = $usuario->find($_SESSION['id']);// puxa os dados do banco onde o cpf é igual ao cpf id da sessão
    // salva os dados em variaveis
    $cpf = $dados[0];
    $nome = $dados[1];
	$email = $dados[2];
	$senha = $dados[3];
	$codigo_condominio = $dados[4]; 
	$nivel_permissao = $dados[5];
	$codigo_moradia = $dados[6];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/anuncios.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/perfil_morador.css"> 
    <script src="js/sidebar.js" defer></script>
    <script src="js/perfil_morador.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Perfil - Domos</title>
</head>
<body>
    <div class="grid-container">
        <!--Cabeçalho-->
        <header class="header d-flex align-items-center justify-content-between m-3"> 
            <div class="menu-icon" onclick="openSidebar()">
                <span class=""><i class="fa-solid fa-bars color-subtitulo"></i></span>
            </div>
        </header>

        <?php
            $_SELECTED = 5; 
            include("aside.php");
        ?>

        <main container class="main-container">
            <div class="d-flex row justify-content-center m-lg-1 m-auto col-12">
                <div class="col-lg-4 col-6 d-flex flex-column align-items-center my-4">
                        <div class="col-sm-7 col-lg-5 col-10 d-flex justify-content-center h-50">
                            <img src="css/img/logodeperfil.png" alt="Foto de Perfil" class="rounded-circle col-12">
                        </div>
                    <a href="editar_perfil_morador.php" class="btn bg-0491a3 hover-0dc0d8 mt-3 mx-2 col-sm-7 col-12 text-white"><i class="fa-solid fa-user-pen flex-grow-1 me-2"></i> Editar perfil</a>
                    <?php 
                        echo "<a href='logout.php' class='btn btn-saida mt-3 mx-2 col-sm-7 col-12 text-white'><i class='fa-solid fa-right-from-bracket flex-grow-1'></i> Encerrar sessão</a>";
                    ?>
                </div>
                
                <div class="col-10 col-lg-7 my-auto d-flex row align-items-center justify-content-lg-start justify-content-center">

                    <div class="col-lg-10 col-12 bg-e8e8e8 p-4 rborder3">
                        <?php // cria partes para mostrar os dados do perfil de usuario
                            echo '<p class="caixa-texto">', $nome, '</p>';
                            echo '<p class="caixa-texto">', $cpf, '</p>';
                            echo '<p class="caixa-texto">', $email, '</p>';
                            echo '<div class="d-flex justify-content-between">
                            <p class="caixa-texto col-5"> Número do apto </p>
                            <p class="caixa-texto col-5"> Nome do bloco</p>
                        </div>';

                        ?>
                    </div>
                    
                </div>

            </div>

        <div class = "col-12 d-flex row justify-content-center my-5"> <!-- Div postagens -->

          <?php 
            
          ?>

        </main>
    </div>
