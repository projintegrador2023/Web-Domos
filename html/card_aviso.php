<!--CARD AVISO IGUAL ANUNCIOS-->
<div class="card m-2 p-0 col-lg-5 col-xl-3 col-8">
    <div class="card-header bg-transparent">
        <div class="fs-5 color-titulo d-flex">
            <!--div class="flex-grow-1"><p class="color-titulo"></p></div> <Usuario-->
            <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
            <div class="dropdown">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical text-dark"></i>
                </button>
                
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Editar</a></li>
                    <li><a class="dropdown-item" href="#">Excluir</a></li>
                </ul>
            </div>
                <button id="salvo" class="btn mb-2"><i class="fa-regular fa-bookmark color-0491a3" onclick="salvos()" estado="vazia"></i><i class="fa-solid fa-bookmark color-0491a3"  style="display: none;" estado="cheia"></i></button>
        </div>
    </div>
            
    <div class="card-body d-flex row text-success">
        <h6 class="titulo card-subtitle fs-5 color-titulo"></h6> <!--titulo-->
        <p class="descricao card-text fs-9 text-justify color-descricao"> </p> <!--descricao-->
    </div>
    
    <div class="filtro card-footer"></div>

<!--CARD AVISO-->
<!-- INICIO DO CARD -->
<div class="card m-2 p-0 col-lg-5 col-xl-3 col-8">
    <div class="card-header bg-transparent">
    <div class="d-flex">
        <h4 class="flex-grow-1 sticky-top color-titulo card-title">Pia quebrada</h4>
        <!--Menu dropdown com funcionalidades que serão adicionadas posteriormente-->
        <div class="d-flex sticky-top">
            <button id="salvo" class="btn"><i class="fa-regular fa-bookmark color-0491a3" onclick="salvos()" estado="vazia"></i><i class="fa-solid fa-bookmark color-0491a3"  style="display: none;" estado="cheia"></i></button>
            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical text-dark"></i></button>
            <div class="dropdown">
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Editar</a></li>
                <li><a class="dropdown-item" href="#">Excluir</a></li>
            </ul>
            </div>
        </div>
        </div> 
    <div>
        <h6 class="card-subtitle color-subtitulo">18/06/2023 - 14:31</h6>
    </div>
    </div>

    <div class="card-body text-success pt-2">
    <p class="card-text fs-9 text-justify color-descricao">Aviso importante aos moradores do condomínio: Informamos que a pia da área comum encontra-se quebrada. 
        Pedimos a todos que evitem utilizar o local temporariamente até que a manutenção seja concluída. 
        Contamos com a compreensão e colaboração de todos para a resolução rápida desse inconveniente. Obrigado.</p>
    </div>
    <div class="card-footer btn-critico"></div>
</div>
        <!-- FIM DO CARD -->