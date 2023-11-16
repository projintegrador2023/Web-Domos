 <div class="card m-2 p-0 col-lg-5 col-xl-3 col-8">
    <div class="card-header bg-transparent">
        <div class="fs-5 color-titulo d-flex">
            <div class="flex-grow-1"><p class="usuario color-titulo"></p></div> <!--Usuario-->
            <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
            <div class="dropdown">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical text-dark"></i>
                </button>
                
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Excluir</a></li>
                </ul>
            </div>
                <button id="salvo" class="btn mb-2"><i class="fa-regular fa-bookmark color-0491a3" onclick="salvos()" estado="vazia"></i><i class="fa-solid fa-bookmark color-0491a3"  style="display: none;" estado="cheia"></i></button>
        </div>
              
        <div>
            <h5 class="moradia card-subtitle fs-6 color-subtitulo"></h5> <!--apto e bloco-->
        </div>
    </div>
            
    <div class="card-body d-flex row text-success">
        <h6 class="titulo card-subtitle fs-5 color-titulo"></h6> <!--titulo-->
        <p class="descricao card-text fs-9 text-justify color-descricao"> </p> <!--descricao-->
        <img src="css/img/palha_italiana.png" class="imagem w-100 h-50 col-lg-5 col-xl-3 col-8"> <!--img-->
    </div>
    
    <div class="filtro card-footer"></div>
 