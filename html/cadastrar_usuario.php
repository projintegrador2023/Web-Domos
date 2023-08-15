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
    <script src="js/script.js" defer></script>
    <title> Cadastro do morador - Domos </title>
</head>

<body>
    <div class="fundo-imagem">
        <!-- cabeçalho da página --> 
        <header class="d-flex justify-content-between p-2">
            <!-- ícone do site -->
            <a href="index.php"> <img src="css/img/logo_branca.png" class="img-fluid col-10 col-md-12 position-relative justify-content-start" alt="Domos"> </a>
            <div class="d-flex position-relative justify-content-end">
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

        <!-- formulário de cadastro de usuário -->
        <section class="mx-auto col-lg-12 col-md-6 col-10 d-block">
            <form class="d-lg-flex justify-content-around">
                <section class="formulario p-5 col-lg-5 col-md-12 mb-lg-0 mb-5">
                    <h1 class="color-0491a3 fs-1 mb-5 text-center"> Cadastro do Morador </h1>
                    <label id="label_nome_usuario" for="nome_usuario" class="fs-4 color-0491a3"> Nome*</label>
                    <input class="bg-e8e8e8 col-12 fs-4 input-form" id="nome_usuario" type="text" required maxlength="45"><br>
                    <p id="erro_nome_usuario" class="fs-6 text-danger"></p>
                    <label id="label_cpf_usuario" for="cpf_usuario" class="fs-4 color-0491a3"> Cpf*</label> 
                    <input class="bg-e8e8e8 col-12 fs-4 input-form" id="cpf_usuario" type="text" required><br>
                    <p id="erro_cpf_usuario" class="fs-6 text-danger"></p>
                    <label id="label_email_usuario" for="email_usuario" class="fs-4 color-0491a3"> E-mail*</label> 
                    <input class="bg-e8e8e8 col-12 fs-4 input-form" id="email_usuario" type="email" required><br>
                    <p id="erro_email_usuario" class="fs-6 text-danger"></p>
                    <label id="label_senha_usuario" for="senha_usuario" class="fs-4 color-0491a3"> Crie sua senha*</label> 
                    <input class="bg-e8e8e8 col-12 fs-4 input-form" id="senha_usuario" type="password" required> <br>
                    <p id="erro_senha_usuario" class="fs-6 text-danger"></p>
                    <label id="label_conf_senha_usuario" for="conf_senha_usuario" class="fs-4 color-0491a3"> Confirme sua senha*</label> 
                    <input class="bg-e8e8e8 col-12 fs-4 input-form" id="conf_senha_usuario" type="password" required><br>
                    <p id="erro_conf_senha_usuario" class="fs-6 text-danger"></p>
                </section>
                <section class="formulario p-5 align-items-center col-lg-5 col-md-12">
                    <h1 class="color-0491a3 fs-1 text-center mb-5"> Informações do condomínio </h1>
                    <label for="input_codigo_condominio" id="label_codigo_condominio" class="fs-4 color-0491a3"> Código do condomínio*</label>
                    <input id="input_codigo_condominio" class="bg-e8e8e8 col-12 fs-4 input-form mb-4" type="text" maxlength="6" required>  <br>
                    <p id="erro_codigo_condominio" class="fs-6 text-danger"></p>

                    <div class="container d-flex justify-content-between p-0">
                        <div class="col-12">
                            <label class="fs-4 color-0491a3"> Nº do apto*</label> <br>
                            <select id="numero_apartamento" class="col-12 fs-5 p-2 border-select text-black rounded mb-4">
                                <option class="text-black"> 101 </option>
                                <option class="text-black"> 102 </option>
                                <option class="text-black"> 103 </option>
                                <option class="text-black"> 104 </option>
                                <option class="text-black"> 105 </option>
                                <option class="text-black"> 106 </option>
                            </select> 
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="fs-4 color-0491a3"> Bloco*</label> <br>
                        <select id="bloco" class="col-12 fs-5 p-2 border-select text-black rounded mb-5">
                            <option class="text-black"> Amarelo </option>
                            <option class="text-black"> Azul </option>
                            <option class="text-black"> Roxo </option>
                            <option class="text-black"> Rosa </option>
                            <option class="text-black"> Laranja </option>
                        </select> <br>  
                    </div>
                    <div class="text-center col-12 mt-4">
                        <button class="bg-005661 color-fff p-2 rounded border-0 button_formulario col-11 fs-3 hover-0491a3" onclick="validacao_cadastro_usuario()"> Cadastrar </button>
                    </div> 
                </section>
            </form>
        </section>

        <!-- rodapé da página --> 
        <footer class="position-fixed text-center col-12 fixed-bottom bg-005661">
            Todos os direitos autorais reservados.
        </footer>
    </div>
</body>
</html>