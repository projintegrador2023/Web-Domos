<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <title> Sobre nós - Domos</title>
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
                        <button class="navbar-toggler type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <section class="text-center mb-5">
            <h1 class="fs-1 text-white"> Sobre nós </h1>
        </section>

        <!-- Texto (conteúdo) da página --> 
        <section class="text m-auto center-block w-75 text-center">
            
            <img class="img-fluid col-12 col-md-10 col-lg-8 col-xl-5 rborder2 backg border-img mb-5" src="css/img/foto_quemsomos.png" alt="Foto da equipe"> <br>
            
            <p class="fs-3 fw-200 m-auto col-12 col-lg-6 col-xl-6 text-justify"> Somos um time de estudantes de informática para internet do Ifes Campus Serra que desenvolvem a Domos!
            </p>
            <p class="fs-3 fw-200 m-auto col-12 col-lg-6 col-xl-6 pb-5 text-justify">
            Da esquerda para a direita, de acordo com a foto, está um pouco sobre cada um da equipe :)
            </p>
            
            <!-- Ficha com o conteúdo sobre cada integrante-->
            <a class="text-decoration-none" href="https://www.instagram.com/ownsummmer/"> 
            <div class="p-4 mb-3 bg-005661 text-white rborder2 m-auto p-1 col-12 col-lg-6 hover-0491a3">
                <p class="text-center font-weight-normal fs-2 pb-0"> Davi Nunes </p>
                <p class="text-justify fw-200 fs-3 mb-0 pb-0">
                    Especializado em back-end, é apaixonado por jogos e tem um talento nato para matemática. Ele está planejando 
                    fazer faculdade de Sistema de Informações para aprimorar ainda mais suas habilidades em programação. <br>
                </p>
            </div> 
            </a>

            <a class="text-decoration-none" href="https://www.instagram.com/milaegydio_/">
            <div class="bg-005661 p-3 mb-3 backg text-white rborder2 m-auto p-1 col-12 col-lg-6 hover-0491a3">
                <p class="text-center fs-2 pb-0"> Camila Egydio </p>
                <p class="text-justify fw-200 fs-3 mb-0 pb-0"> 
                    Nossa especialista em front-end, é uma exímia dançarina e tem um incrível talento para design. 
                    Ela tem o objetivo de fazer faculdade de Artes Visuais para aprimorar ainda mais suas habilidades em design e artes visuais. <br>
                </p>
            </div>
            </a>

            <a class="text-decoration-none" href="https://www.instagram.com/mamin.sant/">
            <div class="bg-005661 p-3 mb-3 backg text-white rborder2 m-auto p-1 col-12 col-lg-6 hover-0491a3">
                <p class="text-center font-weight-normal fs-2 pb-0"> Yasmin Santana </p>
                <p class="text-justify fw-200 fs-3 mb-0 pb-0"> 
                    Nossa especialista em front-end, é uma entusiasta de ciclismo e uma cozinheira de mão cheia. 
                    Ela tem um grande interesse em história e planeja fazer faculdade na área para aprimorar seus conhecimentos sobre o passado e a humanidade. <br>
                </p>
            </div>
            </a>

            <a class="text-decoration-none">
            <div class="bg-005661 p-3 mb-4 backg text-white rborder2 m-auto p-1 col-12 col-lg-6 hover-0491a3">
                <p class="text-center font-weight-normal fs-2 pb-0"> Isabelly Andrades </p>
                <p class="text-justify fw-200 fs-3 mb-0 pb-0">
                    Também especializada em back-end, é uma grande amante da música e tem um talento especial para tocar instrumentos.
                    Ela tem um grande interesse na área médica e planeja fazer faculdade para se tornar médica e cuidar da saúde das pessoas. <br>
                </p>
            </div>
            </a>
            
        </section>

        <!-- Rodapé da página --> 
        <footer class="position-fixed text-center col-12 fixed-bottom bg-005661">
            Todos os direitos autorais reservados.
        </footer>
    </div>  
</body>
</html>