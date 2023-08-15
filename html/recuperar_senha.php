<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <script src="js/script.js" defer></script><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title>Recuperar senha - Domos</title>
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
        
        <!-- Formulário de recuperar senha -->
        <section class="mx-auto d-block col-8 col-md-6 col-lg-5 col-xl-4 p-4 bg-e8e8e8 rborder4">
            <section class="title_login">
                <h1 class="text-center fs-1 color-0491a3"> Recuperar senha </h1>
            </section>

            <section>
                <p class="color-0491a3 fs-6 m-auto text-justify py-3"> Insira o seu email e enviaremos um link para redefinir a senha. </p>
            </section>
            
            <form>
                <label for="input_email" id="label_email" class="fs-5 color-0491a3"> E-mail </label>
                <input id="input_email" class="bg-e8e8e8 col-12 fs-4 input-form" type="email"> <br>
                <p id="erro_recuperar_senha_email" class="text-danger fs-6"></p>
            </form>

            <div class="text-md-end text-center">
                <button class="bg-005661 color-fff p-2 rounded border-0 col-12 col-md-5 col-xl-4 hover-0491a3" onclick="validacao_recuperar_senha()"> Enviar </button>
            </div>
            
        </section>

        <!-- Rodapé da página --> 
        <footer class="position-fixed text-center w-100 fixed-bottom backg">
            Todos os direitos autorais reservados.
        </footer>
    </div>   
</body>
</html>