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
    <link rel="stylesheet" href="css/moradores.css"> 
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Moradores - Domos</title>
</head>
<body>
    <div class="grid-container">
        <header class="header d-flex align-items-center justify-content-between m-3"> 
            <div class="d-flex w-50 ">
            <button class="btn"><i class="fa-solid fa-magnifying-glass search-btn"></i></button>
            <input type="text" class="search ps-2 m-2 w-100" placeholder="Pesquisar...">
            </div>
        </header>

        <aside class="sidebar gradient-custom"> 
            <div class="sidebar-title">
                <div class="sidebar-brand"> 
                    <img src="css/img/logo_branca_icon.png" class="col-12">
                </div>
            </div>
            
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="informacoes.php"> <div><i class="fa-solid fa-circle-info col-2"></i> Informações </div></a>
                </li>
                <li class="sidebar-list-item bg-customiza">
                    <a href="moradores.php"> <div><i class="fa-solid fa-people-roof col-2"></i> Moradores </div></a>
                </li>
                <li class="sidebar-list-item">
                    <a href="areas_reservadas.php"> <div><i class="fa-solid fa-calendar-check col-2"></i> Reservas </div></a>
                </li>
                <li class="sidebar-list-item" id="encerrar">
                    <a href="index.php"> <div><i class="fa-solid fa-right-from-bracket col-2"></i>Encerrar sessão </div></a>
                </li> 
            </ul>
        </aside>

        <main class="main-container d-flex flex-row m-1"> 
        <section class="rounded col-6 d-flex flex-column m-1">
            <div class="bg-0dc0d8 d-flex justify-content-between"> 
                <p class="m-2"> Nome: </p>
                <div class="dropdown">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Excluir morador</a></li>
                    <li><a class="dropdown-item" href="#">Tornar administrador</a></li>
                    <li><a class="dropdown-item" href="#">Tornar síndico</a></li>
                    </ul>
                </div>  
            </div>
            <div class="bg-74ccd8 rounded-bottom">
                <p class="m-2"> Bloco: </p>
                <p class="m-2"> Número: </p>
                <p class="m-2"> Cpf: </p>
                <p class="m-2"> E-mail: </p>
            </div>
        </section>
        <section class="rounded col-6 d-flex flex-column m-1">
            <div class="bg-0dc0d8 d-flex justify-content-between"> 
                <p class="m-2"> Nome: </p>
                <div class="dropdown">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Excluir morador</a></li>
                    <li><a class="dropdown-item" href="#">Tornar administrador</a></li>
                    <li><a class="dropdown-item" href="#">Tornar síndico</a></li>
                    </ul>
                </div>  
            </div>
            <div class="bg-74ccd8 rounded-bottom">
                <p class="m-2"> Bloco: </p>
                <p class="m-2"> Número: </p>
                <p class="m-2"> Cpf: </p>
                <p class="m-2"> E-mail: </p>
            </div>
        </section>
        </main>
    </div>
</body>
</html>
