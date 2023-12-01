
<?php

  if ($tipo_usuario == 'morador'){
    echo '
    <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8 cards-pesquisa">
      <div class="card-header bg-transparent">
        <div class="d-flex">
          <h4 class="flex-grow-1 sticky-top color-titulo card-title">' . $_TITULO_AVISO .'</h4>
          <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
            <div class="d-flex sticky-top">';
              echo '<div class="dropdown">
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><input type="submit" value="Excluir" name="delete" class="dropdown-item"/></li>
                </ul>
              </div>
            </div>
          </div> 
        <div>
          <h6 class="card-subtitle color-subtitulo">' . $_DATA_HORA_AVISO . '</h6>
        </div>
      </div>

      <div class="card-body text-success pt-2">
        <p class="card-text fs-9 text-justify color-descricao">' . $_DESC_AVISO . '</p>
      </div>
      <div class="card-footer" style="'. $_IMPORTANCIA . '"></div>
  </div>';
  } else{
    echo '
    <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8 cards-pesquisa">
      <div class="card-header bg-transparent">
        <div class="d-flex">
          <h4 class="flex-grow-1 sticky-top color-titulo card-title">' . $_TITULO_AVISO .'</h4>
          <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
            <div class="d-flex sticky-top">
            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical text-dark"></i></button>';
              echo '<div class="dropdown">
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><input type="submit" value="Excluir" name="delete" class="dropdown-item"/></li>
                </ul>
              </div>
            </div>
          </div> 
        <div>
          <h6 class="card-subtitle color-subtitulo">' . $_DATA_HORA_AVISO . '</h6>
        </div>
      </div>

      <div class="card-body text-success pt-2">
        <p class="card-text fs-9 text-justify color-descricao">' . $_DESC_AVISO . '</p>
      </div>
      <div class="card-footer" style="'. $_IMPORTANCIA . '"></div>
  </div>';
  }
    
?>
