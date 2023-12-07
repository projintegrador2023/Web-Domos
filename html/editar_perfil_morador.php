<?php 
    require_once("db/30_DB_Usuario.php");
    include_once('./upload.php');
    include("iniciar_sessao.php");
    $tela_morador = true;
    $usuario = new Usuario();
    $dados = $usuario->find($_SESSION['id']); // puxa os dados do banco onde o cpf é igual ao cpf id da sessão
    // salva os dados em variaveis
    $cpf = $dados[0];
    $nome = $dados[1];
    $email = $dados[2];
    $senha = $dados[3];
    $codigo_condominio = $dados[4]; 
    $nivel_permissao = $dados[5];
    $imagem = $dados[6];
    $codigo_moradia = $dados[7];

    if (isset($_POST['submit'])){
        if(!empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['conf_senha']) && !empty($_POST['email'])){
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $conf_senha = $_POST['conf_senha'];
            $email = $_POST['email'];
            
            $sql_bloco = "SELECT codigo_divisao FROM DIVISAO WHERE desc_divisao = :divisao";
            $stmt = Database::prepare($sql_bloco);
            $stmt->bindParam(':divisao', $_POST['bloco']);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_BOTH);
            $codigo_divisao = $dados[0][0];

            $sql_moradia = "SELECT codigo_moradia FROM MORADIA WHERE numero_moradia = :numero AND fk_divisao_codigo_divisao = :codigo_divisao";
            $stmt = Database::prepare($sql_moradia);
            $stmt->bindParam(":numero", $_POST["numero"]);
            $stmt->bindParam(':codigo_divisao', $codigo_divisao, PDO::PARAM_INT);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_BOTH);
            $codigo_moradia = $dados[0][0];

            $usuario->setCodigoMoradia($codigo_moradia);

            if (empty($valErr)){
                $usuario->setImagem($imglink);
            } else {
              $sql_imagem = 'SELECT fk_imagem_codigo_imagem FROM USUARIO WHERE cpf = :cpf';
              $stmt = Database::prepare($sql_imagem);
              $stmt->bindParam(':cpf', $_SESSION['id']);
              $stmt->execute();
              $dados = $stmt->fetch(PDO::FETCH_BOTH);
              $usuario->setCodigoImagem($dados[0]);
            }

            if ($senha == $conf_senha){
              $usuario->setCpf($_SESSION['id']);
              $usuario->setNome($nome);
              $usuario->setSenha($senha);
              $usuario->setEmail($email);
              $usuario->setCodigoCondominio($dados[4]);
              $usuario->setNivelPermissao(3);
              
              $usuario->update($_SESSION['id']);
              header('Location: ./perfil_morador.php');
          }
            
        } else {
            echo '<script>
                alert("Insira todos os dados.");
            </script>';
        }
    }
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
    <title> Editar perfil - Domos</title>
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
            <form action="" method="POST" class="d-flex row justify-content-center m-lg-1 m-auto col-12" enctype="multipart/form-data">
                <div class="col-lg-4 col-6 d-flex flex-column align-items-center my-4">
                        <div class="col-sm-7 col-lg-5 col-10 d-flex justify-content-center h-50">
                          <?php
                            $sql = "SELECT endereco_imagem FROM IMAGEM WHERE codigo_imagem = :codigo_imagem";
                            $stmt = Database::prepare($sql);
                            $stmt->bindParam(':codigo_imagem', $imagem);
                            $stmt->execute();
                            $dados = $stmt->fetch(PDO::FETCH_BOTH);
                            $imglink = $dados[0];
                            echo '<img src="'.$imglink.'" alt="Foto de perfil" class="rounded-circle col-12 h-100">'
                          ?>
                            
                        </div>
                    <label for="file" class="btn bg-0491a3 hover-0dc0d8 mt-3 mx-2 col-sm-7 col-12 text-white">Alterar Foto</label>
                    <input type="file" id="file" name="file" class="d-none" accept=".png, .jpg, .jpeg, .gif"> 
                    <button type="submit" name="submit" class="btn bg-0491a3 hover-0dc0d8 mt-3 mx-2 col-sm-7 col-12 text-white" ><i class="fa-solid fa-floppy-disk me-2"></i>Salvar edição </button>
                    <?php 
                        echo "<a href='db/DB_Delete_usuario.php' class='btn btn-saida mt-3 mx-2 col-sm-7 col-12 text-white'><i class='fa-solid fa-trash flex-grow-1'></i> Excluir conta</a>";
                    ?>
                </div>
                
                <div class="col-10 col-lg-7 my-auto d-flex row align-items-center justify-content-lg-start justify-content-center">

                    <div class="col-lg-10 col-12 bg-e8e8e8 p-4 rborder3">
                        <?php

                            $sql_moradia = "SELECT numero_moradia, desc_divisao FROM MORADIA 
                            INNER JOIN DIVISAO ON fk_divisao_codigo_divisao = codigo_divisao
                            WHERE codigo_moradia = :codigo_moradia";
                            $stmt_moradia = Database::prepare($sql_moradia);
                            $stmt_moradia->bindParam(':codigo_moradia', $codigo_moradia, PDO::PARAM_INT);
                            $stmt_moradia->execute();
                            $dados_moradia = $stmt_moradia->fetch(PDO::FETCH_BOTH);
                            $divisao = $dados_moradia[1];
                            $numero_moradia = $dados_moradia[0]; 
                        // puxa os dados do banco para facilitar a visualização
                            echo '<input type="text" name="nome" class="form-control mb-1" value="', $nome, '">';
                            echo '<input type="password" name="senha" class="form-control mb-1" placeholder="Senha: ">
                            <input type="password" name="conf_senha" class="form-control mb-1" placeholder="Confirmar senha: ">';
                            echo '<input type="text" name="email" class="form-control mb-1" value="', $email, '">';
                        ?>
                        <select name="bloco" id="" class="select-customiza form-control mb-1">
                          <?php 
                            $sql = "SELECT desc_divisao FROM DIVISAO where fk_condominio_codigo_condominio = :codigo_condominio";
                            $stmt = Database::prepare($sql);
                            $stmt->bindParam(':codigo_condominio', $codigo_condominio);
                            $stmt->execute();
                            $nome = $stmt->fetchAll(PDO::FETCH_BOTH);
                            for ($i = 0; $i < $stmt->rowCount(); $i++){
                              if ($nome[$i][0] == $divisao){
                                echo "<option selected class='text-black'>" . $nome[$i][0] . "</option>"; 
                              } else{
                                echo "<option class='text-black'>" . $nome[$i][0] . "</option>"; 
                              }
                                
                            }
                          ?>
                        </select>
                        <select name="numero" id="" class="select-customiza form-control">
                          <?php 
                            $sql = "SELECT numero_moradia FROM MORADIA where fk_condominio_codigo_condominio = :codigo_condominio";
                            $stmt = Database::prepare($sql);
                            $stmt->bindParam(':codigo_condominio', $codigo_condominio);
                            $stmt->execute();
                            $nome = $stmt->fetchAll(PDO::FETCH_BOTH);
                            $i = 1;
                            if ($nome[0][0] == $numero_moradia){
                              echo "<option selected class='text-black'>" . $nome[0][0] . "</option>"; 
                            } else{
                              echo "<option class='text-black'>" . $nome[0][0] . "</option>"; 
                            }
                            while ($nome[$i][0] != $nome[0][0]){
                              if ($nome[$i][0] == $numero_moradia){
                                echo "<option selected class='text-black'>" . $nome[$i][0] . "</option>"; 
                              } else{
                                echo "<option class='text-black'>" . $nome[$i][0] . "</option>"; 
                              }
                              $i++;
                            }
                          ?>
                        </select>
                    </div>
                </div>
            </form>

        <div class = "col-12 d-flex row justify-content-center my-5"> <!-- Div postagens -->

        <?php
          if (!isset($_SESSION)){
            session_start();
          }
          $sql_cod_condominio = "SELECT FK_CONDOMINIO_codigo_condominio from USUARIO where cpf = :cpf";
          $stmt_cod_condominio = Database::prepare($sql_cod_condominio);
          $stmt_cod_condominio->bindParam(':cpf', $_SESSION['id']);
          $stmt_cod_condominio->execute();
          $dados = $stmt_cod_condominio->fetch(PDO::FETCH_BOTH);
          $codigo_condominio = $dados[0];

          $sql = "SELECT * FROM ANUNCIO WHERE FK_CONDOMINIO_codigo_condominio = :FK_CONDOMINIO_codigo_condominio AND fk_usuario_cpf = :cpf";
          $stmt = Database::prepare($sql);
          $stmt->bindParam(':FK_CONDOMINIO_codigo_condominio', $codigo_condominio);
          $stmt->bindParam(':cpf', $_SESSION['id']);
          $stmt->execute();
          $dados = $stmt->fetchAll(PDO::FETCH_BOTH);
          $_TAG = 'background-color: #ff6da7';
          for ($i = $stmt->rowCount()-1; $i >= 0; $i--){
            $codigo_anuncio = $dados[$i][0]; // codigo
            //$_DATA_HORA_ANUNCIO = $dados[$i][1]; // data hora
            $_DESC_ANUNCIO = $dados[$i][2]; // descricao
            $_TITULO_ANUNCIO = $dados[$i][3]; // titulo
            $cpf = $dados[$i][4]; // cpf
            $codigo_tag = $dados[$i][5]; // tag
            $codigo_imagem = $dados[$i][7]; // codigo imagem

            $sql_imagem = "SELECT endereco_imagem FROM IMAGEM WHERE codigo_imagem = :codigo_imagem";
            $stmt_imagem = Database::prepare($sql_imagem);
            $stmt_imagem->bindParam(':codigo_imagem', $codigo_imagem);
            $stmt_imagem->execute();
            $dados_imagem = $stmt_imagem->fetch(PDO::FETCH_BOTH);
            $imagem_anuncio = $dados_imagem[0];
           
            
            $sql_morador = "SELECT * FROM USUARIO WHERE cpf = :cpf";
            $stmt_morador = Database::prepare($sql_morador);
            $stmt_morador->bindParam(':cpf', $cpf);
            $stmt_morador->execute();
            $dados_morador = $stmt_morador->fetch(PDO::FETCH_BOTH);
            $_NOME_MORADOR = $dados_morador[1]; // nome
            $codigo_moradia = $dados_morador[7];

            $sql_moradia = "SELECT numero_moradia, desc_divisao FROM MORADIA 
                              INNER JOIN DIVISAO ON fk_divisao_codigo_divisao = codigo_divisao
                                WHERE codigo_moradia = :codigo_moradia";
            $stmt_moradia = Database::prepare($sql_moradia);
            $stmt_moradia->bindParam(':codigo_moradia', $codigo_moradia, PDO::PARAM_INT);
            $stmt_moradia->execute();
            $dados_moradia = $stmt_moradia->fetch(PDO::FETCH_BOTH);
            $_DIVISAO = $dados_moradia[1];
            $_NUM_MORADIA = $dados_moradia[0]; 

            if ($codigo_tag == 1){
              $_TAG = 'background-color: #ff6da7'; // alimentação
            } else if ($codigo_tag == 2){
              $_TAG = 'background-color: #ff6d6d'; // vestuario
            } else if ($codigo_tag == 3){
              $_TAG = 'background-color: #76E3CE'; // eletronicos
            } else if ($codigo_tag == 4){
              $_TAG = 'background-color: #66b73e'; // beleza
            } else if ($codigo_tag == 5){
              $_TAG = 'background-color: #e6a545'; // decoração
            } else if ($codigo_tag == 6){
              $_TAG = 'background-color: #9f35cc'; // pet-shop
            } else if ($codigo_tag == 7){
              $_TAG = 'background-color: #86AFEA'; // serviços
            } 
            
            //echo $dados[$i][6]; // codigo condominio
            include("card_anuncios.php");
          }
        ?>
        <!-- Modal de editar anúncio -->
        <div class="d-flex justify-content-end m-5">
          
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <!-- - Header do modal -->
                <div class="modal-header">
                  <h5 class="modal-title color-subtitulo" id="staticBackdropLabel">Editar anúncio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- - Formulário de criar anúncio  -->
                <form action="editar_anuncio.php" method="POST" enctype="multipart/form-data">
                  <!-- - Body do modal  -->
                  <div class="modal-body">

                      <input type="hidden" id="idAnuncio" name="idAnuncio">

                      <div class="mb-3">
                        <input type="text" class="form-control" id="titulo_ANUNCIO" name="titulo_ANUNCIO" placeholder="Título">
                      </div>

                      <div class="mb-3">
                          <textarea class="form-control" id="descricao_ANUNCIO" name="descricao_ANUNCIO" placeholder="Descrição" rows="10"></textarea>
                      </div>

                      <select name="tag" class="form-select select-modal mb-3">
                        <option class="color-subtitulo select-modal" value="0">Escolha a tag conforme o anúncio</option>
                        <option style="font-weight: bold;" class="color-alimentacao" value="1">Alimentação</option>
                        <option style="font-weight: bold;" class="color-vestuario" value="2">Vestuário</option>
                        <option style="font-weight: bold;" class="color-eletronicos" value="3">Eletrônicos</option>
                        <option style="font-weight: bold;" class="color-beleza" value="4">Beleza</option>
                        <option style="font-weight: bold;" class="color-decoracao" value="5">Decoração</option>
                        <option style="font-weight: bold;" class="color-petshop" value="6">Pet-Shop</option>
                        <option style="font-weight: bold;" class="color-servicos" value="7">Serviços</option>
                      </select>
                      <input type="file" name="file" class="btn col-5" accept=".png, .jpg, .jpeg, .gif"> 

                  </div>
                  
                  <!-- - Footer do modal  -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Voltar</button>
                    <input type="submit" name="submit" value="Publicar" class="btn btn-publicar">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </main>
    </div>