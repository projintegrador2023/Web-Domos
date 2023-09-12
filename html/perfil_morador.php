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
    <link rel="stylesheet" href="css/perfil_morador.css"> 
    <link rel="stylesheet" href="css/anuncios.css"> 
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/sidebar.js" defer></script>
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

      <!-- Navegação em abas pela barra lateral (sidebar)-->
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
        </aside>
        <main container class="main-container">
            <div class="d-flex justify-content-center">
                <div class="col-6 d-flex flex-column m-1">
                    <div class="">
                        <img src="css/img/moradora4.jpeg" alt="moradora 4" class="rounded-circle foto">
                        <button class="btn btn-editar"><i class="fa-solid fa-user-pen flex-grow-1"></i> Editar Informações</button>
                    </div>
                    <div class="bg-cinza p-4 rborder3">
                        <p class="caixa-texto">Nome Morador</p>
                        <p class="caixa-texto">Senha senha 12345678</p>
                        <p class="caixa-texto">testetes@gmail.com</p>
                        <div class="d-flex col-6">
                            <p class="caixa-texto">num bloco</p>
                            <p class="caixa-texto ms-5">Nome Bloco</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-2 m-lg-2 mb-3 p-0" style="max-width: 25rem;">
            <div class="card-header bg-transparent">
              <div class="fs-5 color-titulo d-flex">
                <div class="flex-grow-1"><p class="color-titulo">Zelma Regina</p></div>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis-vertical text-dark"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Excluir</a></li>
                  </ul>
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