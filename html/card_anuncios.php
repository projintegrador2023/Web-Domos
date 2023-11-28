<?php 
    echo '
    <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8 cards-pesquisa">
      <div class="card-header bg-transparent">
        <div class="d-flex">
          <h4 class="flex-grow-1 sticky-top color-titulo card-title">' . $_NOME_MORADOR . '</h4>
          <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
            <div class="d-flex sticky-top">
              <button id="salvo" class="btn"><i class="fa-regular fa-bookmark color-0491a3" onclick="salvos()" estado="vazia"></i><i class="fa-solid fa-bookmark color-0491a3"  style="display: none;" estado="cheia"></i></button>
              <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical text-dark"></i></button>
              <div class="dropdown">
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Excluir</a></li>
                </ul>
              </div>
            </div>
          </div> 
        <div>
          <h6 class="card-subtitle color-subtitulo">' . $_DIVISAO .  ' - ' . $_NUM_MORADIA . '</h6>
        </div>
      </div>
      <div class="card-body d-flex row text-success">
        <h6 class="card-subtitle fs-5 color-titulo">' . $_TITULO_ANUNCIO . '</h6>
        <p class="card-text fs-9 text-justify color-descricao">' . $_DESC_ANUNCIO
        . '</p>
        <!--img src="css/img/palha_italiana.png" class="w-100 h-50 col-lg-5 col-xl-3 col-8"--> 
      </div>
      <div class="card-footer" style="'. $_TAG .'"></div>
    </div> 
    '
?>