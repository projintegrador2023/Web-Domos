<?php 
  include("iniciar_sessao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/reservas.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/sidebar.js" defer></script> </script>

    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Reservas - Domos </title>
</head>

<body>
    <!-- Container -->
    <div class="grid-container">
        <!--Cabeçalho de pesquisa e filtros-->
        <header class="header m-2">
            <div class="menu-icon" onclick="openSidebar()">
                <span class=""><i class="fa-solid fa-bars color-subtitulo"></i></span>
            </div>
            <div class="btn-group bg_group w-100 m-2">
                <a href="#" class="btn bg_group"> Churrasqueira </a>
                <a href="#" class="btn bg_group"> Espaço Gourmet </a>
                <a href="#" class="btn bg_group"> Espaço Kids </a>
                <a href="#" class="btn bg_group">Sala de Jogos </a>
                <a href="#" class="btn bg_group"> Salão de festas </a>
                <a href="#" class="btn bg_group"> Sauna </a>
                <a href="#" class="btn bg_group"> Quadra </a> 
                <!-- <a href="testes.php" class="btn bg_group"> Testes </a> (sera utilizado no proximo trabalho)-->
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
                <li class="sidebar-list-item">
                    <a href="anuncios.php">
                        <div><i class="fa-solid fa-bag-shopping col-2" style="color: #ffffff;"></i> Anúncios </div>
                    </a>
                </li>
                <li class="sidebar-list-item bg-customiza">
                    <a href="reservas.php">
                    <div><i class="fa-solid fa-calendar-days col-2"></i> Reservas </div>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="regimento.php">
                        <div><i class="fa-solid fa-note-sticky col-2"></i> Regimento </div>
                    </a>
                </li>
                <?php 
                    echo "<li class='sidebar-list-item'>
                            <a href='perfil_morador.php'>
                                <div> <i class='fa-solid fa-user col-2' style='color: #ffffff;'></i>", $_SESSION['id'],  "</div>
                            </a>
                        </li>";
                ?>
                <!--li class="sidebar-list-item">
                    <a href="informacoes.php">
                        <div><i class="fa-solid fa-gear col-2"></i></i> Configurações </div>
                    </a>
                </li-->
            </ul>
        </aside>

        <!-- Main principal (container)-->  
        <main class="main-container"> 
            
            <!-- Calendário --> 
            <form>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </form>  
            
            <p> Página em desenvolvimento</p>

        </main>
    </div>

</html>