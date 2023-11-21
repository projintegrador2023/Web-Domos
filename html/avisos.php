<?php 
  include("iniciar_sessao.php");
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
    <script src="js/sidebar.js" defer></script>
    <script src="js/avisos.js" defer></script>
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
          <input type="search" class="search ps-2 m-2 w-100 text-dark" placeholder="Pesquisar...">
        </div>

        <div class="justify-content-around col-4 mt-2" id="btns_filtro">
          <select class="color-subtitulo form-select select-modal mb-3">
            <option selected class="color-subtitulo"> Filtre conforme a importância</option>
            <option value="critico" id="btn_critico" style="font-weight: bold;" class="color-critico">Crítico</option>
            <option value="urgente" id="btn_urgente" style="font-weight: bold;" class="color-urgente">Urgente</option>
            <option value="importante" id="btn_importante" style="font-weight: bold;"  class="color-importante">Importante</option>
            <option value="salvos" id="btn_salvos" style="font-weight: bold; color:#0dc0d8;">Salvos</option>
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
          include("card_aviso.php");
        ?>
        <!-- FIM DO CARD -->
        
        
      <!-- Modal (pop up)-->
      <div class="d-flex justify-content-end m-5">
        <div class="absolute" style="overflow-y: auto;">
          <button type="button" class="btn btn-criar rounded-circle justify-content-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus p-1 icons-white"></i></button>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              
              <!-- Header do modal-->
              <div class="modal-header">
                <h5 class="modal-title titulo color-0491a3" id="staticBackdropLabel">Criar aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <!-- Body do modal-->
              <div class="modal-body">
                <!-- Formulário de criar aviso-->
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="titulo_aviso" placeholder="Título">
                  </div>

                  <div class="mb-3">
                      <textarea class="form-control form-customiza" id="descricao_aviso" placeholder="Descrição" rows="10"></textarea>
                  </div>

                  <select class="form-select select-modal mb-3">
                      <option selected class="">Escolha a importância do aviso</option>
                      <option value="critico" id="btn_critico" class="btn-critico">Crítico</option>
                      <option value="urgente" id="btn_urgente" class="btn-urgente">Urgente</option>
                      <option value="importante" id="btn_importante" class="btn-importante">Importante</option>
                  </select>
              </form>
              <!-- Footer do modal-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Voltar</button>
                <a href="avisos.php"><button type="button" class="btn btn-publicar">Publicar</button></a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>