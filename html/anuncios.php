<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/anuncios.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/sidebar.js" defer></script>
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
          <input type="text" class="search ps-3 m-lg-2 w-100" placeholder="Pesquisar...">
        </div>

        <div class="justify-content-around w-75 btns-geral" id="btns_filtro">
          <button class="btn btn-alimentacao w-25 m-2 rounded-5 fs-5 color-fff" type="button">Alimentação</button>
          <button class="btn btn-vestuario w-25 m-2 rounded-5 fs-5 color-fff" type="button">Vestuário</button>
          <button class="btn btn-eletronicos w-25 m-2 rounded-5 fs-5 color-fff" type="button">Eletrônicos</button>
          <button class="btn btn-beleza w-25 m-2 rounded-5 fs-5 color-fff" type="button">Beleza</button>
          <button class="btn btn-decoracao w-25 m-2 rounded-5 fs-5 color-fff" type="button">Decoração</button>
          <button class="btn btn-petshop w-25 m-2 rounded-5 fs-5 color-fff" type="button">Petshop</button>
          <button class="btn btn-servicos w-25 m-2 rounded-5 fs-5 color-fff" type="button">Serviços</button>
          <button class="btn text-start" type="button" onclick="MostarFiltro(btns_filtro)"><i class="fa-solid fa-filter filter-btn"></i></button>
        </div> 
        
        <div class=""> 
          <select name="" id="" class="select-customiza">
            <option selected class="">Filtros</option>
            <option value="alimentacao" class="tag-alimentacao">Alimentação</option>
            <option value="vestuario" class="tag-vestuario">Vestuário</option>
            <option value="eletronicos" class="tag-eletronicos">Eletrônicos</option>
            <option value="beleza" class="tag-beleza">Beleza</option>
            <option value="decoracao" class="tag-decoracao">Decoração</option>
            <option value="petshop" class="tag-petshop">Petshop</option>
            <option value="servicos" class="tag-servicos">Serviços</option>
          </select>
        </div>

      </header>

      <!-- Navegação em abas pela barra lateral (sidebar) --> 
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
                <div><i class="fa-solid fa-bell col-2"></i> Avisos </div>
            </a>
          </li>
          <li class="sidebar-list-item bg-customiza">
            <a href="anuncios.php">
                <div><i class="fa-solid fa-cart-shopping col-2"></i> Anúncios </div>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="reservas.php">
              <div><i class="fa-solid fa-calendar-days col-2"></i> Reservas </div>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="regimento.php">
                <div><i class="fa-solid fa-note-sticky col-2"></i> Regimento </div>
            </a>
          </li>
          <li class="sidebar-list-item">
              <a href="perfil_morador.php">
                  <div> <i class="fa-solid fa-user col-2" style="color: #ffffff;"></i> Perfil </div>
              </a>
          </li>
          <li class="sidebar-list-item">
            <a href="informacoes.php">
                <div><i class="fa-solid fa-gear col-2"></i></i> Configurações </div>
            </a>
          </li>
        </ul>
      </aside>
         
      <!-- Main principal (container)--> 
      <main class="main-container m-2"> 
          
        <!-- Div contendo os cards -->
        <div class="row justify-content-between">
          <!-- Cards -->  
          <div class="card mt-2 m-lg-2 mb-3 p-0"  style="max-width: 25rem;">
            <div class="card-header bg-transparent">
              <div class="fs-5 color-titulo d-flex">
                <div class="flex-grow-1"><p class="color-titulo">Zelma Regina</p></div>
                <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
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
              <h6 class="card-subtitle fs-5 color-titulo">Palha italiana</h6>
              <p class="card-text fs-9 text-justify color-descricao">Feita com chocolate de qualidade e leite condensado cremoso, 
                nossa palha italiana é perfeita para adoçar seu dia. Peça já a sua e surpreenda-se com essa maravilha italiana. 
                Pedidos: (27)999656552
              </p>
              <img src="css/img/palha_italiana.png" class="img-fluid card-img"> 
            </div>
            <div class="card-footer tag-alimentacao"></div>
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
  
          <div class="card mt-2 m-lg-2 mb-3 p-0" style="max-width: 25rem;">
            <div class="card-header bg-transparent">
              <div class="fs-5 color-titulo d-flex">
                <div class="flex-grow-1"><p class="color-titulo">Letícia Teixeira</p></div>
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
              <h5 class="card-subtitle fs-6 color-subtitulo">Apto 105 - Bloco Azul</h5>
              </div>
            </div>
  
            <div class="card-body text-success">
              <h6 class="card-subtitle fs-5 color-titulo">Revendedora Natura</h6>
              <p class="card-text fs-9 text-justify color-descricao"> Encontre os melhores produtos da marca com a nossa revendedora autorizada. 
                Cuidados com a pele, perfumes, maquiagem e muito mais. Agende agora mesmo uma demonstração e experimente a qualidade Natura.</p>             
              <img src="css/img/natura.png" class="img-fluid card-img">  
            </div>
            <div class="card-footer tag-beleza"></div>
          </div>
  
          <div class="card mt-2 m-lg-2 mb-3 p-0" style="max-width: 25rem;">
            <div class="card-header bg-transparent">
              <div class="fs-5 color-titulo d-flex">
                <div class="flex-grow-1"><p class="color-titulo">Raynan Silva</p></div>
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
              <h5 class="card-subtitle fs-6 color-subtitulo">Apto 107 - Bloco Azul</h5>
              </div>
            </div>
  
            <div class="card-body text-success">
              <h6 class="card-subtitle fs-5 color-titulo">Iphone XR</h6>
              <p class="card-text fs-9 text-justify color-descricao">Vendo iPhone XR vermelho, usado por 1 ano. Excelente estado, sem arranhões. 
                Desbloqueado e pronto para uso. Inclui carregador original. Preço negociável. Entre em contato para mais informações.
              </p> 
              <img src="css/img/iphoneXR.png" class="img-fluid card-img">               
            </div>
            <div class="card-footer tag-eletronicos"></div>
          </div>
  
          <div class="card mt-2 m-lg-2 mb-3 p-0" style="max-width: 25rem;">
            <div class="card-header bg-transparent">
              <div class="fs-5 color-titulo d-flex">
                <div class="flex-grow-1"><p class="color-titulo">Lorena Torres</p></div>
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
              <h5 class="card-subtitle fs-6 color-subtitulo">Apto 105 - Bloco Roxo</h5>
              </div>
            </div>
  
            <div class="card-body text-success">
              <h6 class="card-subtitle fs-5 color-titulo">Penteado</h6>
              <p class="card-text fs-9 text-justify color-descricao">Destaque-se em qualquer ocasião com penteados criativos como esse! 
                Combinando tranças e coques, esse estilo é perfeito para o carnaval ou festas temáticas. Experimente e surpreenda! Agende já seu horário: 27999663344.
              </p> 
              <img src="css/img/penteado.png" class="img-fluid card-img"> 
            </div>
            <div class="card-footer tag-servicos"></div>
          </div>

          <div class="card mt-2 m-lg-2 mb-3 p-0" style="max-width: 25rem;">
            <div class="card-header bg-transparent">
              <div class="fs-5 color-titulo d-flex">
                <div class="flex-grow-1"><p class="color-titulo">Camila Egydio</p></div>
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
              <h5 class="card-subtitle fs-6 color-subtitulo">Apto 304 - Bloco Roxo</h5>
              </div>
            </div>
  
            <div class="card-body text-success">
              <h6 class="card-subtitle fs-5 color-titulo">Vendo almofada</h6>
              <p class="card-text fs-9 text-justify color-descricao">Renove sua decoração com o Kit de 4 capas para almofadas folhas branco.
                  Confeccionadas em tecido macio e resistente, combinam com diversos estilos de ambientes. Aproveite a promoção e adquira já o seu!
              </p>
              <img src="css/img/almofada.png" class="img-fluid card-img">
            </div>
            <div class="card-footer tag-decoracao"></div>
          </div>
        </div>

        <!-- Modal (pop up)-->
        <!--<div class="d-flex justify-content-end m-5">
          <button type="button" class="btn btn-criar rounded-circle" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fs-3 fa-solid fa-plus icons-white align-content-center" aria-hidden="true"></i></button>
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                - Header do modal
                <div class="modal-header">
                  <h5 class="modal-title color-0491a3" id="staticBackdropLabel">Criar anúncio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                - Body do modal 
                <div class="modal-body">  
                  - Formulário de criar anúncio 
                  <form>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="titulo_aviso" placeholder="Título">
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" id="descricao_aviso" placeholder="Descrição" rows="10"></textarea>
                    </div>

                    <select class="form-select select-customiza mb-3">
                        <option selected class="select-customiza">Escolha a tag do anúncio</option>
                        <option value="1" class="select-customiza">Alimentação</option>
                        <option value="2" class="select-customiza">Vestuário</option>
                        <option value="3" class="select-customiza">Eletrônicos</option>
                        <option value="4" class="select-customiza">Decoração</option>
                        <option value="5" class="select-customiza">Petshop</option>
                        <option value="6" class="select-customiza">Serviços</option>
                    </select>
                    <input type="file" class="btn col-5"> 

                  </form>
                </div>
                
                - Footer do modal 
                <div class="modal-footer">
                  <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Voltar</button>
                  <a href="anuncios.html"><button type="button" class="btn bg-005661 hover-0dc0d8">Publicar</button></a>
                </div>

              </div>
            </div>
          </div>
        </div>-->
    </main>
  </div>
 
</body>
</html>