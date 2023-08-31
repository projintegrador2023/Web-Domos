<!DOCTYPE html><!--oiiiiiiiiiiiiiiiii ass: Kauâ-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <script src="js/script.js" defer></script>
    <script src="js/formulario.js" defer></script>
    <title> Cadastro do morador - Domos </title>
</head>

<body>
    <div class="fundo-imagem pb-5">
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
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" aria-current="page" href="#contatos">Contatos</a>
                            </li>
                            <li class="nav-item">
                            <a class="text-end nav-link text-white fs-4 p-3" href="index.php#sobre_nos">Sobre nós </a>
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

        <!-- formulário de cadastro de usuário -->
        <section class="mx-auto col-12 col-sm-8 col-lg-7 col-xl-4 d-block p-5">
            <form class="">
                <div class="formulario p-5" id="div_cadastro_morador">
                    
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
                    <input class="bg-e8e8e8 col-12 fs-4 input-form" id="senha_usuario" type="password" required> <br><!--oiiiiiiiiiiiiiiiii ass: Kauâ-->
                    <p id="erro_senha_usuario" class="fs-6 text-danger"></p>
                    <label id="label_conf_senha_usuario" for="conf_senha_usuario" class="fs-4 color-0491a3"> Confirme sua senha*</label> 
                    <input class="bg-e8e8e8 col-12 fs-4 input-form" id="conf_senha_usuario" type="password" required><br>
                    <p id="erro_conf_senha_usuario" class="fs-6 text-danger"></p>

                    <div class="text-end col-12 pt-4">
                        <button type="button" class="bg-005661 color-fff p-2 rounded border-0 col-lg-5 col-xl-4 fs-3 hover-0491a3" onclick="trocar_formulario_usuario()"> Continuar </button>
                    </div>
                </div>

                <div class="formulario p-5 d-none" id="div_informacoes_condominio">
                    <div class="d-flex p-3">
                        <button type="button" class="rounded-5 border-0 fs-1 bg-e8e8e8" onclick="voltar_formulario_usuario()"><i class="fa-solid fa-circle-arrow-left color-0491a3"></i></button>
                        <h1 class="color-0491a3 fs-1 text-center"> Informações do condomínio </h1>
                    </div>


                    <div class="p-3 pt-0">
                        <label for="input_codigo_condominio" id="label_codigo_condominio" class="fs-4 color-0491a3"> Código do condomínio*</label>
                        <input id="input_codigo_condominio" class="bg-e8e8e8 col-12 fs-4 input-form" type="text" maxlength="6" required>  <br>
                        <p id="erro_codigo_condominio" class="fs-6 text-danger"></p>
                    </div>

                    
                    <div class="container d-flex justify-content-between pb-3">
                            <div class="col-5">
                            <label class="fs-4 color-0491a3"> Nº do apto*</label> <br>
                            <select id="numero_apartamento" class="col-12 fs-5 p-2 border-select text-black rounded">
                                <option class="text-black"> 101 </option>
                                <option class="text-black"> 102 </option>
                                <option class="text-black"> 103 </option>
                                <option class="text-black"> 104 </option>
                                <option class="text-black"> 105 </option>
                                <option class="text-black"> 106 </option>
                            </select> 
                        </div>
                        <div class="col-5">
                            <label class="fs-4 color-0491a3"> Bloco*</label> <br>
                            <select id="bloco" class="col-12 fs-5 p-2 border-select text-black rounded">
                                <option class="text-black"> Amarelo </option>
                                <option class="text-black"> Azul </option>
                                <option class="text-black"> Roxo </option>
                                <option class="text-black"> Rosa </option>
                                <option class="text-black"> Laranja </option> 
                            </select> <br>  
                        </div> 
                    </div> 
                    <div class="text-end col-12 pt-4">
                        <button type="button" class="bg-005661 color-fff p-2 rounded border-0 button_formulario col-4 fs-3 hover-0491a3" onclick="validacao_cadastro_usuario()"> Cadastrar </button>
                    </div>
                </div>
            </form>
            </div>         
        </section>

        <!-- Rodapé da página --> 
        <footer class="bg-005661 position-absolute w-100">
        <div class="d-md-flex d-block justify-content-around col-12 pt-3" id="contatos">
            <div class="p-2 col-md-7 col-12">

                <h1 class="ps-md-2 text-center fs-1"> Contatos </h1>
                <div class="col-md-10 m-auto align-items-center"> 
                    <div class="bg-eB5661 d-flex flex-md-row flex-column align-items-center ms-2 p-3 fs-5 fs-md-3">
                        <button class="rounded-circle border-0 bg-0491a3" style="width:2.5rem; height:2.5rem;"> <i class="fa-regular fa-envelope"></i> </button>
                        <p class="m-0 p-2 fw-200"> projintegrador.domos@gmail.com </p>
                    </div>

                    <div class="bg-eB5661 d-flex flex-md-row flex-column align-items-center ms-2 p-3 fs-5 fs-md-3">
                        <button class="rounded-circle border-0 bg-0491a3" style="width:2.5rem; height:2.5rem;"> <i class="fa-brands fa-whatsapp color-fdfdfd"></i> </button>
                        <p class="m-0 p-2 fw-200"> (27)996517829 </p>
                    </div>

                    <div class="bg-eB5661 d-flex flex-md-row flex-column align-items-center ms-2 p-3 fs-5 fs-md-3">
                        <button class="rounded-circle border-0 bg-0491a3" style="width:2.5rem; height:2.5rem;"> <i class="fa-brands fa-instagram color-fdfdfd"></i> </button> 
                        <p class="m-0 p-2 fw-200"> @domosoficial </p>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-12">

                <h1 class="ps-2 text-center fs-1 p-2"> Colaboração </hl>

                <div class="d-flex flex-md-row flex-column align-items-center col-6 m-auto">
                    <img class="img-responsive w-50 col-3 f-2 mx-auto mt-5" src="css/img/ifes.png">
                    <img class="img-responsive col-3 f-2 mx-auto mt-5" src="css/img/inovaserra.png">
                </div> 

            </div>

            <br>
        </div>
            
        </footer> 
    </div>
</body>
</html>
