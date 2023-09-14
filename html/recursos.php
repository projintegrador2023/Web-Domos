<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Recursos - Domos</title>
</head>

<body>
    <div class="fundo-imagem">
         <!-- Cabeçalho da página --> 
         <header class="d-flex justify-content-between p-2">

            <!-- Ícone do site -->
            <a href="index.php"> <img src="css/img/logo_branca.png" class="img-fluid col-10 col-md-12 position-relative justify-content-start" alt="Domos"> </a>
            <div class="d-flex position-relative justify-content-end">

                 <!-- Menu -->
                <nav class="d-flex navbar navbar-expand-lg navbar-dark position-relative">
                    <div class="container-fluid d-flex justify-content-end">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" aria-current="page" href="recursos.php">Recursos</a>
                            </li>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" href="sobre_nos.php">Sobre nós </a>
                            </li>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" href="contato.php">Contato</a>
                            </li>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" href="login.php">Entrar</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        
        <!-- Título da página -->
        <section class="title d-flex justify-content-center align-items-center"> 
            <h1 class="text-white"> Recursos </h1>
        </section>

        <!-- Conteúdo da página -->
        <div class="container py-5 d-flex justify-content-center align-content-center w-100">
            
            <!-- SlideShow -->
            <div id="carouselExample" class="carousel slide col-10 shadow-black" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active" data-bs-interval="3000">
                        <img class="d-block w-100" src="css/img/carrossel_reserva.png" alt="1" >
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
                        <img class="d-block w-100" src="css/img/carrossel_espacos.png" alt="2" >
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
                        <img class="d-block w-100" src="css/img/carrossel_avisos.png" alt="3" >
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
                        <img class="d-block w-100" src="css/img/carrossel_anuncios.png" alt="4" >
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
                        <img class="d-block w-100" src="css/img/carrossel_regimento.png" alt="5" >
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
                        <img class="d-block w-100" src="css/img/carrossel_criacao.png" alt="6" >
                    </div>
                </div>

                <button class="carousel-control-prev no-hover" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

                <div class="carousel-indicators">
                    <button class="active" data-bs-target="#carouselExample" data-bs-slide-to="0"></button>
                    <button class="" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
                    <button class="" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
                    <button class="" data-bs-target="#carouselExample" data-bs-slide-to="3"></button>
                    <button class="" data-bs-target="#carouselExample" data-bs-slide-to="4"></button>
                    <button class="" data-bs-target="#carouselExample" data-bs-slide-to="5"></button>
                </div>
                
            </div>
        </div>

        <!-- Rodapé da página --> 
        <footer class="position-fixed text-center col-12 fixed-bottom bg-005661">
            Todos os direitos autorais reservados.
        </footer>
    </div>
</body>
</html>