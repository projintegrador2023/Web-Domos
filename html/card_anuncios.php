<?php 
  if ($tela_morador){
    if (!empty($imagem_anuncio)){
      echo '
      <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8 cards-pesquisa">
        <div class="card-header bg-transparent">
          <div class="d-flex">
            <h4 class="flex-grow-1 sticky-top color-titulo card-title">' . $_NOME_MORADOR . '</h4>
            <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
              <div class="d-flex sticky-top">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical text-dark"></i></button>';
                echo 
                '<div class="dropdown">
                  <ul class="dropdown-menu">
                    <li><button type="button" id="' . $codigo_anuncio . '" class="dropdown-item botao-excluir"/>Excluir</button></li>
                    <li><button type="button" class="dropdown-item botao-editar-anuncio" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-anuncio-id="'.$codigo_anuncio.'" data-anuncio-titulo="'.$_TITULO_ANUNCIO.'" data-anuncio-descricao="'.$_DESC_ANUNCIO.'" data-anuncio-tag="'. $codigo_tag .'"/>Editar</button></li>
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
          <img src="'.$imagem_anuncio.'" class="w-100 h-50 col-lg-5 col-xl-3 col-8"> 
        </div>
        <div class="card-footer" style="'. $_TAG .'"></div>
      </div> 
      ';
    } else {
      echo '
      <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8 cards-pesquisa">
        <div class="card-header bg-transparent">
          <div class="d-flex">
            <h4 class="flex-grow-1 sticky-top color-titulo card-title">' . $_NOME_MORADOR . '</h4>
            <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
              <div class="d-flex sticky-top">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical text-dark"></i></button>';
                echo 
                '<div class="dropdown">
                  <ul class="dropdown-menu">
                    <li><button type="button" id="' . $codigo_anuncio . '" class="dropdown-item botao-excluir"/>Excluir</button></li>
                    <li><button type="button" class="dropdown-item botao-editar-anuncio" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-anuncio-id="'.$codigo_anuncio.'" data-anuncio-titulo="'.$_TITULO_ANUNCIO.'" data-anuncio-descricao="'.$_DESC_ANUNCIO.'" data-anuncio-tag="'. $codigo_tag .'"/>Editar</button></li>
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
        </div>
        <div class="card-footer" style="'. $_TAG .'"></div>
      </div> 
      ';
    }
    
  } else {
    if (!empty($imagem_anuncio)){
      echo '
      <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8 cards-pesquisa">
        <div class="card-header bg-transparent">
          <div class="d-flex">
            <h4 class="flex-grow-1 sticky-top color-titulo card-title">' . $_NOME_MORADOR . '</h4>
            <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
              <div class="d-flex sticky-top">';
                echo 
                '<div class="dropdown">
                  <ul class="dropdown-menu">
                    <li><input type="submit" value="Excluir" name="delete" class="dropdown-item"/></li>
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
          <img src="'.$imagem_anuncio.'" class="w-100 h-50 col-lg-5 col-xl-3 col-8"> 
        </div>
        <div class="card-footer" style="'. $_TAG .'"></div>
      </div> 
      ';
    } else {
      echo '
    <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8 cards-pesquisa">
      <div class="card-header bg-transparent">
        <div class="d-flex">
          <h4 class="flex-grow-1 sticky-top color-titulo card-title">' . $_NOME_MORADOR . '</h4>
          <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
            <div class="d-flex sticky-top">';
              echo 
              '<div class="dropdown">
                <ul class="dropdown-menu">
                  <li><input type="submit" value="Excluir" name="delete" class="dropdown-item"/></li>
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
      </div>
      <div class="card-footer" style="'. $_TAG .'"></div>
    </div> 
    ';
    }
    
  }
    
?>