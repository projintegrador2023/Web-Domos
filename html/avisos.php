<?php 
  include("iniciar_sessao.php");
  require_once('db/DB_Aviso.php');
  $cpf = $_SESSION['id'];
  $aviso = new Aviso();

  error_log("Exec 3", 0); //testando c daniel

  if (isset($_POST['submit'])){
    if (!empty($_POST['titulo_aviso']) && !empty($_POST['descricao_aviso']) && $_POST['importancia'] != 'Escolha a importancia conforme o aviso'){
      $aviso->setTitulo($_POST['titulo_aviso']);
      $aviso->setDescricao($_POST['descricao_aviso']);
      $timezone = new DateTimeZone('America/Sao_Paulo');
      $data_hora = new DateTime('now', $timezone);
      $data_hora_formatada = $data_hora->format('Y-m-d H:i:s');
      $aviso->setDataHoraPostagem($data_hora_formatada);
      if ($_SESSION['tipo_usuario'] == 1){
        $aviso->setCodigoCondominio($_SESSION['id'], '');
      } else {
        $aviso->setCodigoCondominio('', $_SESSION['id']);
      }

      $sql = "SELECT codigo_importancia FROM IMPORTANCIA WHERE desc_importancia = :importancia";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(':importancia', $_POST['importancia']);
      $stmt->execute();
      $dados = $stmt->fetch(PDO::FETCH_BOTH);
      $codigo_importancia = $dados[0];
      $aviso->setFKImportanciaCodigoImportancia($codigo_importancia);
      
      if(empty($_POST['file'])){
        try{
          error_log("Exec 1", 0);
          $aviso->insert();
          header('Location: avisos.php');
        } catch(PDOException $e) {
          echo '<script>  
                      alert("Algo deu errado, verifique as informações do aviso e tente novamente.");
                  </script>';
                  echo $e;
        }
      } else {
        // codigo pra inserir a imagem no banco e linkar com o aviso
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/avisos.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/aviso.js" defer></script>
    <script src="js/sidebar.js" defer></script>
    <script src="js/pesquisar.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Avisos - Domos </title>
</head>

<body>
  <!-- Container -->
  <div class="grid-container">
    <!--Cabeçalho de pesquisa e filtros-->  
    <header class="header d-flex align-items-center justify-content-between m-3">
        <div class="menu-icon" onclick="openSidebar()">
          <span class=""><i class="fa-solid fa-bars color-subtitulo"></i></span>
        </div>
        <div class="d-flex w-50 ">
          <button class="btn"><i class="fa-solid fa-magnifying-glass search-btn"></i></button>
          <input type="search" class="search ps-2 m-2 w-100 text-dark" placeholder="Pesquisar..." onkeyup="search()" id="pesquisar">
        </div>

        <div class="justify-content-around col-4 mt-2" id="btns_filtro">
          <select class="color-subtitulo form-select select-modal mb-3" onChange="filtro_aviso()" onfocus="this.selectedIndex = -1;" id="select_filtro">
            <option selected class="color-subtitulo"> Escolha conforme a importância</option>
            <option id="btn_critico" style="font-weight: bold;" class="color-critico">Crítico</option>
            <option id="btn_urgente" style="font-weight: bold;" class="color-urgente">Urgente</option>
            <option id="btn_importante" style="font-weight: bold;"  class="color-importante">Importante</option>
          </select>
        </div>
    </header>
    
    <?php
      $_SELECTED = 1; 
      include("aside.php");
    ?>

    <!-- Main principal (container)--> 
    <main class="main-container m-2">

      <!-- Div contendo os cards -->  
      <div class="row justify-content-center col-12">
        <!-- Cards --> 
        <!-- INICIO DO CARD -->
        <?php
          if (!isset($_SESSION)){
            session_start();
          }
          if ($_SESSION['tipo_usuario'] == 1){
            $sql = 'SELECT fk_nivel_permissao_codigo_nivel_permissao FROM USUARIO WHERE cpf = :cpf';
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':cpf', $_SESSION['id']);
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_BOTH);
            $nivel_permissao = $dados[0];
            
            if ($nivel_permissao != 3){
              $tipo_usuario = 'adm';
            } else {
              $tipo_usuario = 'morador';
            }

            $sql_cod_condominio = "SELECT FK_CONDOMINIO_codigo_condominio from USUARIO where cpf = :cpf";
            $stmt_cod_condominio = Database::prepare($sql_cod_condominio);
            $stmt_cod_condominio->bindParam(':cpf', $_SESSION['id']);
            $stmt_cod_condominio->execute();
            $dados = $stmt_cod_condominio->fetch(PDO::FETCH_BOTH);
            $codigo_condominio = $dados[0];
  
            $sql = "SELECT * FROM AVISO WHERE FK_CONDOMINIO_codigo_condominio = :FK_CONDOMINIO_codigo_condominio";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':FK_CONDOMINIO_codigo_condominio', $codigo_condominio);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_BOTH);
            $_IMPORTANCIA = 'background-color: #cc0000';
            for ($i = $stmt->rowCount() - 1; $i >= 0 ; $i--){
              $codigo_aviso = $dados[$i][0]; // codigo
              $_DATA_HORA_AVISO = $dados[$i][1]; // data hora
              $_DESC_AVISO = $dados[$i][2]; // descricao
              $_TITULO_AVISO = $dados[$i][3]; // titulo
              //echo $dados[$i][4]; // cpf
              $codigo_importancia = $dados[$i][5]; // importancia
  
              //$sql_importancia = "SELECT desc_importancia FROM IMPORTANCIA WHERE codigo_importancia = :codigo_importancia";
              //$stmt_importancia = Database::prepare($sql_importancia);
              //$stmt_importancia->bindParam(':codigo_importancia', $codigo_importancia, PDO::PARAM_INT);
              //$stmt_importancia->execute();
              //$dados_importancia = $stmt_importancia->fetch(PDO::FETCH_BOTH);
              if ($codigo_importancia == 1){
                $_IMPORTANCIA = 'background-color: #cc0000';
              } else if ($codigo_importancia == 2){
                $_IMPORTANCIA = 'background-color: #F7D74A';
              } else if ($codigo_importancia == 3){
                $_IMPORTANCIA = 'background-color: #90ee90';
              }
              
              //echo $dados[$i][6]; // codigo condominio
              include("card_aviso.php");
            }
          } else {
            $sql_cod_condominio = "SELECT codigo_condominio from CONDOMINIO where cnpj = :cnpj";
            $stmt_cod_condominio = Database::prepare($sql_cod_condominio);
            $stmt_cod_condominio->bindParam(':cnpj', $_SESSION['id']);
            $stmt_cod_condominio->execute();
            $dados = $stmt_cod_condominio->fetch(PDO::FETCH_BOTH);
            $codigo_condominio = $dados[0];

            $sql = "SELECT * FROM AVISO WHERE FK_CONDOMINIO_codigo_condominio = :FK_CONDOMINIO_codigo_condominio";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':FK_CONDOMINIO_codigo_condominio', $codigo_condominio);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_BOTH);
            $_IMPORTANCIA = 'background-color: #cc0000';

            $tipo_usuario = 'adm';

            for ($i = $stmt->rowCount() - 1; $i >= 0 ; $i--){
              $codigo_aviso = $dados[$i][0]; // codigo
              $_DATA_HORA_AVISO = $dados[$i][1]; // data hora
              $_DESC_AVISO = $dados[$i][2]; // descricao
              $_TITULO_AVISO = $dados[$i][3]; // titulo
              $codigo_importancia = $dados[$i][4]; // importancia
  
              //$sql_importancia = "SELECT desc_importancia FROM IMPORTANCIA WHERE codigo_importancia = :codigo_importancia";
              //$stmt_importancia = Database::prepare($sql_importancia);
              //$stmt_importancia->bindParam(':codigo_importancia', $codigo_importancia, PDO::PARAM_INT);
              //$stmt_importancia->execute();
              //$dados_importancia = $stmt_importancia->fetch(PDO::FETCH_BOTH);
              if ($codigo_importancia == 1){
                $_IMPORTANCIA = 'background-color: #cc0000';
              } else if ($codigo_importancia == 2){
                $_IMPORTANCIA = 'background-color: #F7D74A';
              } else if ($codigo_importancia == 3){
                $_IMPORTANCIA = 'background-color: #90ee90';
              }
              
              
              //echo $dados[$i][6]; // codigo condominio
              include("card_aviso.php");
          }
        }
          
        ?>
        <!-- FIM DO CARD -->
        
        
      <!-- Modal (pop up)-->
      <div class="d-flex justify-content-end m-5">
        <?php 
          if ($_SESSION['tipo_usuario'] == 1){
            $sql = 'SELECT fk_nivel_permissao_codigo_nivel_permissao FROM USUARIO WHERE cpf = :cpf';
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':cpf', $_SESSION['id']);
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_BOTH);
            $nivel_permissao = $dados[0];
            
            if ($nivel_permissao != 3){
              echo '<div class="absolute" style="overflow-y: auto;">
              <button type="button" class="btn btn-criar rounded-circle justify-content-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus p-1 icons-white"></i></button>
            </div>';
            }
          } else {
            echo '<div class="absolute" style="overflow-y: auto;">
              <button type="button" class="btn btn-criar rounded-circle justify-content-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus p-1 icons-white"></i></button>
            </div>';
          }
          
        ?>

        
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              
              <!-- Header do modal-->
              <div class="modal-header">
                <h5 class="modal-title titulo color-0491a3" id="staticBackdropLabel">Criar aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form action="" method="POST">
                <!-- Body do modal-->
                <div class="modal-body">
                  <!-- Formulário de criar aviso-->
                  
                    <div class="mb-3">
                      <input type="text" class="form-control" id="titulo_aviso" name="titulo_aviso" placeholder="Título">
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control form-customiza" id="descricao_aviso" name="descricao_aviso" placeholder="Descrição" rows="10"></textarea>
                    </div>

                    <select name="importancia" class="form-select select-modal mb-3">
                      <option selected class="color-subtitulo"> Escolha a importancia conforme o aviso</option>
                      <option id="btn_critico" style="font-weight: bold;" class="color-critico">Crítico</option>
                      <option id="btn_urgente" style="font-weight: bold;" class="color-urgente">Urgente</option>
                      <option id="btn_importante" style="font-weight: bold;"  class="color-importante">Importante</option>
                    </select>
                <!-- Footer do modal-->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Voltar</button>
                  <input type="submit" name="submit" value="Publicar" class="btn btn-publicar">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>