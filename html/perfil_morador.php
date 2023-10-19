<!-- NÃO UTILIZADO NESSE TRABALHO -->


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

      <!-- Navegação em abas pela barra lateral (sidebar)>
        <aside id="sidebar" class="sidebar gradient-custom">
            <div class="sidebar-title d-flex p-3 flex-column align-items-end">
                <span class="pt-3 px-3" onclick="closeSidebar()">
                    <i class="fa-solid fa-xmark fs-1"></i>
                </span>

                <div class="sidebar-brand">
                    <img src="css/img/logo_branca_icon.png" class="img-fluid" style="height: 14rem; width: 14rem;">
                </div>
            
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="avisos.php">
                        <div><i class="fa-solid fa-circle-info col-2"></i> TESTE - AVISOS </div>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="informacoes.php">
                        <div><i class="fa-solid fa-people-roof col-2"></i> TESTE - INFO</div>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="reservas.php">
                        <div><i class="fa-solid fa-calendar-check col-2"></i> TESTE </div>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="index.php">
                        <div><i class="fa-solid fa-right-from-bracket col-2"></i> TESTE </div>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="perfil_morador.php">
                        <div> PERFIL MORADOR TESTE </div>
                    </a>
                </li>
            </ul>
        </aside-->
        <?php
            $_SELECTED = 5; 
            include("aside.php");
        ?>

        <main container class="main-container">
            <div class="d-flex row justify-content-center m-lg-1 m-auto col-12">
                <div class="col-lg-4 col-6 d-flex flex-column align-items-center my-4">
                        <div class="col-sm-7 col-lg-5 col-10 d-flex justify-content-center h-50">
                            <img src="css/img/moradora4.jpeg" alt="moradora 4" class="rounded-circle col-12 h-100">
                        </div>
                    <button class="btn bg-0491a3 hover-0dc0d8 mt-3 mx-2 col-sm-7 col-12 text-white" ><i class="fa-solid fa-user-pen flex-grow-1"></i> Editar perfil </button>
                    <?php 
                        echo "<a href='logout.php' class='btn btn-saida mt-3 mx-2 col-sm-7 col-12 text-white'><i class='fa-solid fa-right-from-bracket flex-grow-1'></i> Encerrar sessão</a>";
                    ?>
                </div>
                
                <div class="col-10 col-lg-7 my-auto d-flex row align-items-center justify-content-lg-start justify-content-center">

                    <div class="col-lg-10 col-12 bg-e8e8e8 p-4 rborder3">
                        <p class="caixa-texto">Camila Fraga Egydio</p>
                        <p class="caixa-texto">12345678900</p>
                        <p class="caixa-texto">testetes@gmail.com</p>
                        <div class="d-flex justify-content-between">
                            <p class="caixa-texto col-5">Num bloco</p>
                            <p class="caixa-texto col-5">Nome Bloco</p>
                        </div>
                    </div>
                    
                </div>

            </div>

        <div class = "col-12 d-flex row justify-content-center my-5"> <!-- Div postagens -->

          <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8">
            <div class="card-header bg-transparent">
              <div class="fs-5 color-titulo d-flex">
                <div class="flex-grow-1"><p class="color-titulo">Zelma Regina</p></div>
                    <div class="p-1">
                        <!-- Modal Excluir Anuncio-->
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash color-005661"></i></button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 color-005661" id="exampleModalLabel">Deseja excluir esse anúncio?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-saida" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-confirmar">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-pen color-005661"></i></button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title color-0491a3" id="staticBackdropLabel">Editar Anúncio</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="titulo_aviso" placeholder="Título">
                                            </div>

                                            <div class="mb-3">
                                                <textarea class="form-control" id="descricao_aviso" placeholder="Descrição" rows="10"></textarea>
                                            </div>

                                            <select class="form-select mb-3">
                                                <option selected class= "select-modal">Escolha a tag do anúncio</option>
                                                <option value="1" class="select-modal">Alimentação</option>
                                                <option value="2" class="select-modal">Vestuário</option>
                                                <option value="3" class="select-modal">Eletrônicos</option>
                                                <option value="4" class="select-modal">Decoração</option>
                                                <option value="5" class="select-modal">Petshop</option>
                                                <option value="6" class="select-modal">Serviços</option>
                                            </select>
                                            <input type="file" class="btn col-5"> 
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-saida" data-bs-dismiss="modal">Voltar</button>
                                        <a href="anuncios.html"><button type="button" class="btn btn-publicar">Publicar</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button id="estrela" class="btn"><i class="fa-regular fa-star cor-estrela p-1" onclick="estrela()" estado="vazia"></i><i class="fa-solid fa-star cor-estrela p-1"  style="display: none;" estado="cheia"></i></button>
                    </div>
              </div>
              <div>
              <h5 class="card-subtitle fs-6 color-subtitulo">Apto 203 - Bloco Amarelo</h5>
              </div>
            </div>
  
            <div class="card-body text-success">
              <h6 class="card-subtitle fs-5 color-titulo">Pipoca doce</h6>
              <p class="card-text fs-9 text-justify color-descricao">Crocante, quentinha e coberta com uma deliciosa camada de açúcar caramelizado, 
                nossa pipoca doce é perfeita para aqueles momentos de prazer. Experimente agora mesmo e sinta o sabor incrível dessa delícia! Peça já a sua. 
                Ligue 30660633 para pedir!</p> 
              <img src="css/img/pipoca_doce.png" class="img-fluid card-img">      
            </div>
            <div class="card-footer tag-alimentacao"></div>
          </div>

        </main>
    </div>