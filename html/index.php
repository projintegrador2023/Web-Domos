<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Home - Domos </title>
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
                            <a class="text-end nav-link text-white fs-4 p-3" href="sobre_nos.php">Sobre nós </a>
                            </li>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3 bg-0491a3 hover-0dc0d8 rounded" href="login.php">Entrar</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <div class="m-5">
            <!-- Título da página --> 
        <section class = "d-flex justify-content-center align-items-center mb-5 px-2 px-sm-0"> 
            <h1 class="center-text fs-1 text-white px-0"> Bem vindo ao seu site de condomínio, Domos! </h1>
        </section>
        
        <!-- Botões da página --> 
        <section class = "d-flex justify-content-center align-items-center m-auto mb-5">
            <a class="text-center" href="cadastrar_usuario.php"><button class="bg-005661 color-fff p-3 rounded border-0 fs-4 col-10 col-sm-8 col-lg-10 hover-0491a3"> Cadastro do Morador </button></a>
            <p class="fs-4 col-1 p-0 text-center ms-0 ps-1 ps-sm-3 ps-lg-3 me-sm-0"> OU </p> 
            <a class="text-center" href="cadastro_condominio.php"> <button class=" bg-005661 color-fff p-3 rounded border-0 fs-4 col-9 col-sm-7 col-lg-9 hover-0491a3"> Cadastro do Condomínio </button> </a>
        </section>
        
        <!-- Texto (conteúdo) da página --> 
        <section class = "d-block justify-content-center align-items-center text text-justify fs-4 m-auto mb-5 col-10 col-lg-8 col-xl-7"> 
            <p class="text-white fw-200">A aplicação Domos oferece uma solução completa e eficiente para a comunicação e organização em condomínios. 
                Com ela, os moradores poderão ter acesso a informações importantes de forma rápida e fácil, além de poderem 
                agendar espaços com tranquilidade e segurança. A plataforma é uma verdadeira aliada para uma gestão mais eficiente e 
                organizada do seu condomínio. 
                <br><br><br><br><br><br><br>
            </p>

            <br>
        </section>
        </div>

        <!-- Div recursos --> 
        <div class="bg-005661 p-4"> 
        <div class=" d-flex  justify-content-center mb-4 fs-1"> <h1> Funcionalidades <h1> </div> 
        <div class=" d-flex flex-column flex-md-row align-items-center h-25 justify-content-evenly"> 
                <div class="h-100 w-100 d-block align-items-center text-center"> 
                    <button class="rounded-circle circle bg-0491a3 border-0"> 
                    <i class="fa-solid fa-bell color-fdfdfd" style="font-size:8vh"></i>  
                    </button> 
                    <p class="fs-4 mt-3"> Avisos </p>
                </div>
                <div class="h-100 w-100 d-block align-items-center text-center"> 
                    <button class="rounded-circle circle bg-0491a3 border-0 text-center"> 
                        <i class="fa-solid fa-cart-shopping color-fdfdfd" style="font-size:8vh"></i>  
                    </button>
                    <p class="fs-4 mt-3"> Anúncios </p>
                </div> 
                <div class="h-100 w-100 d-block align-items-center text-center"> 
                    <button class="rounded-circle circle bg-0491a3 border-0"> 
                        <i class="fa-solid fa-calendar-days color-fdfdfd" style="font-size:8vh"> </i>  
                    </button> 
                    <p class="fs-4 mt-3"> Reservas </p>
                </div>
                <div class="h-100 w-100 d-block align-items-center text-center"> 
                    <button class="rounded-circle circle bg-0491a3 border-0"> 
                        <i class="fa-solid fa-note-sticky color-fdfdfd" style="font-size:8vh"></i>  
                    </button> 
                    <p class="fs-4 mt-3"> Regimento </p>
                </div>
        </div>
        </div>

        <br>
        <!-- Sobre nós --> 
        <div class="d-flex justify-content-center col-12"> 
            <div class="d-flex col-10"> 
                <img class="w-25 img-fluid col-md-10 col-lg-8 col-xl-5 border-0 my-5 ms-5" src="css/img/foto_quemsomos.png" alt="Foto da equipe"> 
            
                <div class="ms-5">
                    <h1 class="mt-5 mb-3"> Sobre nós </h1> 
                
                    <p class="fs-3 fw-200 text-justify">
                    Somos um time de estudantes de informática 
                    para internet do Ifes Campus Serra que desenvolvem a Domos!</p>
                </div>
            </div>
        </div>
        
        <br> <br> 

        <!-- Rodapé da página --> 
        <footer class="bg-005661 position-absolute w-100">
        <div class="d-flex justify-content-between">
        <div class="p-2">
            <h1 class="ps-2 text-center fs-1"> Contatos </h1>
            <div class="bg-eB5661 d-flex align-items-center ms-2 p-3">
            <i class="fa-regular fa-envelope fs-3"></i> 
            <p class="m-0 p-2 fs-4 fw-200"> projintegrador.domos@gmail.com </p>
        </div>

        <div class="bg-005661 d-flex align-items-center ms-2 p-3">
            <i class="fa-brands fa-whatsapp color-fdfdfd fs-3"></i>  
            <p class="m-0 p-2 fs-4 fw-200"> (27)996517829 </p>
        </div>

        <div class="bg-005661 d-flex align-items-center ms-2 p-3">
            <i class="fa-brands fa-instagram color-fdfdfd fs-3"></i>  
            <p class="m-0 p-2 fs-4 fw-200"> @domosoficial </p>
        </div>
        </div>

        <div class="">
            <h1 class="ps-2 text-center fs-1 p-2"> Colaboração </hl>
            <div class="d-flex">
            <img class="w-50 h-75 f-2 mx-auto mt-5 d-block img-fluid" src="css/img/ifes.png">
            <img class="w-25 h-75 f-2 mx-auto mt-5 d-block img-fluid" src="css/img/inovaserra.png">
            </div> 
            
        </div> <br>
        </div>
            
        </footer>            
</body>
</html>
