<?php 
  include("iniciar_sessao.php");
  require_once('db/DB_Anuncio.php');
  $cpf = $_SESSION['id'];
  $anuncio = new Anuncio();

  if (isset($_POST['submit'])){
    if (!empty($_POST['titulo_ANUNCIO']) && !empty($_POST['descricao_ANUNCIO']) && $_POST['tag'] != 'Escolha a tag conforme o anúncio'){
      $anuncio->setTitulo($_POST['titulo_ANUNCIO']);
      $anuncio->setDescricao($_POST['descricao_ANUNCIO']);
      $timezone = new DateTimeZone('America/Sao_Paulo');
      $data_hora = new DateTime('now', $timezone);
      $data_hora_formatada = $data_hora->format('Y-m-d H:i:s');
      $anuncio->setDataHoraPostagem($data_hora_formatada);
      $anuncio->setFKUsuarioCpf($cpf);

      $sql = "SELECT codigo_tag FROM TAG WHERE desc_tag = :tag";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(':tag', $_POST['tag']);
      $stmt->execute();
      $dados = $stmt->fetch(PDO::FETCH_BOTH);
      $codigo_tag = $dados[0];
      $anuncio->setFKTagCodigoTag($codigo_tag);

      if ($_FILES["file"]["size"] > 0){
        $client_id = "e3f4c9231b6cf9e";
        $filename = $_FILES['file']['tmp_name'];
        
        $image_data = file_get_contents($filename);
        $image_data_base64 = base64_encode($image_data);
        
        $api_url = 'https://api.imgur.com/3/image.json';
        
        $headers = array(
            'Authorization: Client-ID ' . $client_id,
            'Content-Type: application/x-www-form-urlencoded'
        );
        
        $postData = http_build_query(array('image' => $image_data_base64));
        
        $options = array(
            'http' => array(
                'header' => implode("\r\n", $headers),
                'method' => 'POST',
                'content' => $postData
            )
          );
        
        $context = stream_context_create($options);
        $result = file_get_contents($api_url, false, $context);
        
        if ($result === FALSE) {
            echo "Erro ao enviar arquivo para o Imgur";
        } else {
            $response = json_decode($result, true);
            $foto = $response['data']['link'];
            
            $anuncio->setCodigoImagem($foto);
            try{
              $anuncio->insert();
              header('Location: anuncios.php');
            } catch(PDOException $e) {
              echo '<script>  
                          alert("Algo deu errado, verifique as informações do anúncio e tente novamente.");
                      </script>';
                      echo $e;
            }
        }
      } else {
          try{
            $anuncio->insert();
            header('Location: anuncios.php');
          } catch(PDOException $e) {
            echo '<script>  
                        alert("Algo deu errado, verifique as informações do anúncio e tente novamente.");
                    </script>';
                    echo $e;
          }
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
    <link rel="stylesheet" href="css/anuncios.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/sidebar.js" defer></script>
    <script src="js/pesquisar.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Anúncios - Domos</title>
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
        <select class="color-subtitulo form-select select-modal mb-3" onChange="filtro_anuncio()" id="select_filtro">
            <option selected class="color-subtitulo select-modal">Escolha as tags conforme as cores</option>
            <option style="font-weight: bold;" class="color-alimentacao" >Alimentação</option>
            <option style="font-weight: bold;" class="color-vestuario">Vestuário</option>
            <option style="font-weight: bold;" class="color-eletronicos">Eletrônicos</option>
            <option style="font-weight: bold;" class="color-beleza">Beleza</option>
            <option style="font-weight: bold;" class="color-decoracao">Decoração</option>
            <option style="font-weight: bold;" class="color-petshop">Petshop</option>
            <option style="font-weight: bold;" class="color-servicos">Serviços</option>
          </select>
        </div> 

      </header>

      <?php
        $_SELECTED = 2; 
        include("aside.php");
      ?>
         
      <!-- Main principal (container)--> 
      <main class="main-container m-2"> 
          
        <!-- Div contendo os cards -->
        <div class="row justify-content-center col-12">
          <!-- Cards --> 
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

          $sql = "SELECT * FROM ANUNCIO WHERE FK_CONDOMINIO_codigo_condominio = :FK_CONDOMINIO_codigo_condominio";
          $stmt = Database::prepare($sql);
          $stmt->bindParam(':FK_CONDOMINIO_codigo_condominio', $codigo_condominio);
          $stmt->execute();
          $dados = $stmt->fetchAll(PDO::FETCH_BOTH);
          $_TAG = 'background-color: #ff6da7';
          for ($i = 0; $i < $stmt->rowCount(); $i++){
            //echo $dados[$i][0]; // codigo
            //$_DATA_HORA_ANUNCIO = $dados[$i][1]; // data hora
            $_DESC_ANUNCIO = $dados[$i][2]; // descricao
            $_TITULO_ANUNCIO = $dados[$i][3]; // titulo
            $cpf = $dados[$i][4]; // cpf
            $codigo_tag = $dados[$i][5]; // tag
           
            
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

        <!-- Modal (pop up)-->
        <div class="d-flex justify-content-end m-5">
          <div class="absolute" style="overflow-y: auto;">
            <button type="button" class="btn btn-criar rounded-circle justify-content-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus p-1 icons-white"></i></button>
          </div>
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <!-- - Header do modal -->
                <div class="modal-header">
                  <h5 class="modal-title color-subtitulo" id="staticBackdropLabel">Criar anúncio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- - Formulário de criar anúncio  -->
                <form action="" method="POST">
                  <!-- - Body do modal  -->
                  <div class="modal-body">  
                      <div class="mb-3">
                        <input type="text" class="form-control" id="titulo_ANUNCIO" name="titulo_ANUNCIO" placeholder="Título">
                      </div>

                      <div class="mb-3">
                          <textarea class="form-control" id="descricao_ANUNCIO" name="descricao_ANUNCIO" placeholder="Descrição" rows="10"></textarea>
                      </div>

                      <select name="tag" class="form-select select-modal mb-3">
                        <option class="color-subtitulo select-modal">Escolha a tag conforme o anúncio</option>
                        <option style="font-weight: bold;" class="color-alimentacao" >Alimentação</option>
                        <option style="font-weight: bold;" class="color-vestuario">Vestuário</option>
                        <option style="font-weight: bold;" class="color-eletronicos">Eletrônicos</option>
                        <option style="font-weight: bold;" class="color-beleza">Beleza</option>
                        <option style="font-weight: bold;" class="color-decoracao">Decoração</option>
                        <option style="font-weight: bold;" class="color-petshop">Pet-Shop</option>
                        <option style="font-weight: bold;" class="color-servicos">Serviços</option>
                      </select>
                      <input type="file" name="file" class="btn col-5"> 

                    
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
        </div>
    </main>
  </div> 
</body>
</html>