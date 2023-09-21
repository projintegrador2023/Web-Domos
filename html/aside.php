<?php 

    include("iniciar_sessao.php");

    echo "<aside id='sidebar' class='sidebar gradient-custom'>
    <div class='sidebar-title d-flex p-3 flex-column align-items-end'>
        <span class='pt-3 px-3' onclick='closeSidebar()'>
            <i class='fa-solid fa-xmark fs-1'></i>
        </span>

        <div class='sidebar-brand'>
            <img src='css/img/logo_branca_icon.png' class='img-fluid' style='height: 14rem; width: 14rem;'>
        </div>
        
        </div>";
    if ($_SELECTED == 1){
        echo "<ul class='sidebar-list'>
        <li class='sidebar-list-item bg-customiza'>
            <a href='avisos.php'>
                <div><i class='fa-solid fa-bell col-2'></i> Avisos </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='anuncios.php'>
                <div><i class='fa-solid fa-bag-shopping col-2' style='color: #ffffff;'></i> Anúncios </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='reservas.php'>
            <div><i class='fa-solid fa-calendar-days col-2'></i> Reservas </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='regimento.php'>
                <div><i class='fa-solid fa-note-sticky col-2'></i> Regimento </div>
            </a>
        </li>";

        echo "<li class='sidebar-list-item'>
        <a href='perfil_morador.php'>
            <div> <i class='fa-solid fa-user col-2' style='color: #ffffff;'></i>", $_SESSION['id'],  "</div>
        </a>
        </li>";
        
        echo "
        <!--li class='sidebar-list-item'>
                    <a href='informacoes.php'>
                        <div><i class='fa-solid fa-gear col-2'></i></i> Configurações </div>
                    </a>
                </li-->
        
    </ul>
</aside>";
    } else if ($_SELECTED == 2){
        echo "<ul class='sidebar-list'>
        <li class='sidebar-list-item'>
            <a href='avisos.php'>
                <div><i class='fa-solid fa-bell col-2'></i> Avisos </div>
            </a>
        </li>
        <li class='sidebar-list-item bg-customiza'>
            <a href='anuncios.php'>
                <div><i class='fa-solid fa-bag-shopping col-2' style='color: #ffffff;'></i> Anúncios </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='reservas.php'>
            <div><i class='fa-solid fa-calendar-days col-2'></i> Reservas </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='regimento.php'>
                <div><i class='fa-solid fa-note-sticky col-2'></i> Regimento </div>
            </a>
        </li>";

        echo "<li class='sidebar-list-item'>
        <a href='perfil_morador.php'>
            <div> <i class='fa-solid fa-user col-2' style='color: #ffffff;'></i>", $_SESSION['id'],  "</div>
        </a>
        </li>";
        
        echo "
        <!--li class='sidebar-list-item'>
                    <a href='informacoes.php'>
                        <div><i class='fa-solid fa-gear col-2'></i></i> Configurações </div>
                    </a>
                </li-->
        
    </ul>
</aside>";
    } else if ($_SELECTED == 3){
        echo "<ul class='sidebar-list'>
        <li class='sidebar-list-item'>
            <a href='avisos.php'>
                <div><i class='fa-solid fa-bell col-2'></i> Avisos </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='anuncios.php'>
                <div><i class='fa-solid fa-bag-shopping col-2' style='color: #ffffff;'></i> Anúncios </div>
            </a>
        </li>
        <li class='sidebar-list-item bg-customiza'>
            <a href='reservas.php'>
            <div><i class='fa-solid fa-calendar-days col-2'></i> Reservas </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='regimento.php'>
                <div><i class='fa-solid fa-note-sticky col-2'></i> Regimento </div>
            </a>
        </li>";

        echo "<li class='sidebar-list-item'>
        <a href='perfil_morador.php'>
            <div> <i class='fa-solid fa-user col-2' style='color: #ffffff;'></i>", $_SESSION['id'],  "</div>
        </a>
        </li>";
        
        echo "
        <!--li class='sidebar-list-item'>
                    <a href='informacoes.php'>
                        <div><i class='fa-solid fa-gear col-2'></i></i> Configurações </div>
                    </a>
                </li-->
        
    </ul>
</aside>";
    } else if ($_SELECTED == 4){
        echo "<ul class='sidebar-list'>
        <li class='sidebar-list-item'>
            <a href='avisos.php'>
                <div><i class='fa-solid fa-bell col-2'></i> Avisos </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='anuncios.php'>
                <div><i class='fa-solid fa-bag-shopping col-2' style='color: #ffffff;'></i> Anúncios </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='reservas.php'>
            <div><i class='fa-solid fa-calendar-days col-2'></i> Reservas </div>
            </a>
        </li>
        <li class='sidebar-list-item bg-customiza'>
            <a href='regimento.php'>
                <div><i class='fa-solid fa-note-sticky col-2'></i> Regimento </div>
            </a>
        </li>";

        echo "<li class='sidebar-list-item'>
        <a href='perfil_morador.php'>
            <div> <i class='fa-solid fa-user col-2' style='color: #ffffff;'></i>", $_SESSION['id'],  "</div>
        </a>
        </li>";
        
        echo "
        <!--li class='sidebar-list-item'>
                    <a href='informacoes.php'>
                        <div><i class='fa-solid fa-gear col-2'></i></i> Configurações </div>
                    </a>
                </li-->
        
    </ul>
</aside>";
    } else if ($_SELECTED == 5){
        echo "<ul class='sidebar-list'>
        <li class='sidebar-list-item'>
            <a href='avisos.php'>
                <div><i class='fa-solid fa-bell col-2'></i> Avisos </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='anuncios.php'>
                <div><i class='fa-solid fa-bag-shopping col-2' style='color: #ffffff;'></i> Anúncios </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='reservas.php'>
            <div><i class='fa-solid fa-calendar-days col-2'></i> Reservas </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='regimento.php'>
                <div><i class='fa-solid fa-note-sticky col-2'></i> Regimento </div>
            </a>
        </li>";

        echo "<li class='sidebar-list-item bg-customiza'>
        <a href='perfil_morador.php'>
            <div> <i class='fa-solid fa-user col-2' style='color: #ffffff;'></i>", $_SESSION['id'],  "</div>
        </a>
        </li>";
        
        echo "
        <!--li class='sidebar-list-item'>
                    <a href='informacoes.php'>
                        <div><i class='fa-solid fa-gear col-2'></i></i> Configurações </div>
                    </a>
                </li-->
        
    </ul>
</aside>";
    } else if ($_SELECTED == 6){
        echo "<ul class='sidebar-list'>
        <li class='sidebar-list-item'>
            <a href='avisos.php'>
                <div><i class='fa-solid fa-bell col-2'></i> Avisos </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='anuncios.php'>
                <div><i class='fa-solid fa-bag-shopping col-2' style='color: #ffffff;'></i> Anúncios </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='reservas.php'>
            <div><i class='fa-solid fa-calendar-days col-2'></i> Reservas </div>
            </a>
        </li>
        <li class='sidebar-list-item'>
            <a href='regimento.php'>
                <div><i class='fa-solid fa-note-sticky col-2'></i> Regimento </div>
            </a>
        </li>";

        echo "<li class='sidebar-list-item'>
        <a href='perfil_morador.php'>
            <div> <i class='fa-solid fa-user col-2' style='color: #ffffff;'></i>", $_SESSION['id'],  "</div>
        </a>
        </li>";
        
        echo "
        <!--li class='sidebar-list-item bg-customiza'>
                    <a href='informacoes.php'>
                        <div><i class='fa-solid fa-gear col-2'></i></i> Configurações </div>
                    </a>
                </li-->
        
    </ul>
</aside>";
    }
    

            

?>