<!DOCTYPE html>
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
    <?php include('header.php'); ?>
        <!-- formulário de cadastro de usuário -->
        <section class="mx-auto mt-4 col-12 col-sm-8 col-lg-7 col-xl-5 d-block">
            <form class="" action="db/30_DB_create.php" method="POST">
                <div class="formulario mx-3 px-5 py-4" id="div_cadastro_morador">
                    
                    <h1 class="color-0491a3 fs-2 mb-4 mt-3 text-center"> Cadastro do Morador </h1>
                    <label id="label_nome_usuario" for="nome_usuario" class="fs-5 color-0491a3"> Nome*</label>
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="nome_usuario" name="nome_usuario" type="text" required maxlength="45"><br>
                    <p id="erro_nome_usuario" class="fs-6 text-danger"></p>
                    <label id="label_cpf_usuario" for="cpf_usuario" class="fs-5 color-0491a3"> Cpf*</label> 
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="cpf_usuario" name="cpf_usuario" type="text" required><br>
                    <p id="erro_cpf_usuario" class="fs-6 text-danger"></p>
                    <label id="label_email_usuario" for="email_usuario" class="fs-5 color-0491a3"> E-mail*</label> 
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="email_usuario" name="email_usuario" type="email" required><br>
                    <p id="erro_email_usuario" class="fs-6 text-danger"></p>
                    <label id="label_senha_usuario" for="senha_usuario" class="fs-5 color-0491a3"> Crie sua senha*</label> 
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="senha_usuario" name="senha_usuario" type="password" required> <br>
                    <p id="erro_senha_usuario" class="fs-6 text-danger"></p>
                    <label id="label_conf_senha_usuario" for="conf_senha_usuario" class="fs-5 color-0491a3"> Confirme sua senha*</label> 
                    <input class="bg-e8e8e8 col-12 fs-5 input-form" id="conf_senha_usuario" name="conf_senha_usuario" type="password" required><br>
                    <p id="erro_conf_senha_usuario" class="fs-6 text-danger"></p>

                    <div class="my-3">
                        <label for="input_codigo_condominio" id="label_codigo_condominio" class="fs-5 color-0491a3"> Código do condomínio*</label>
                        <input id="input_codigo_condominio" name="input_codigo_condominio" class="bg-e8e8e8 col-12 fs-5 input-form" type="text" maxlength="6" required>  <br>
                        <p id="erro_codigo_condominio" class="fs-6 text-danger"></p>
                    </div>

                    <div class="text-end col-12 pt-4">
                        <button type="button" class="bg-005661 color-fff p-2 rounded border-0 col-12 col-md-6 col-xxl-3 hover-0491a3" onclick="trocar_formulario_usuario()"> Continuar </button>
                    </div>
                </div>

                <div class="formulario mx-3 px-5 py-4 d-none" id="div_informacoes_condominio">
                    <div class="d-flex align-items-center">
                        <button type="button" class="rounded-5 border-0 fs-1 bg-e8e8e8" onclick="voltar_formulario_usuario()"><i class="fa-solid fa-circle-arrow-left color-0491a3"></i></button>
                        <h1 class="color-0491a3 ms-4 fs-2 text-center"> Cadastro da moradia </h1>
                    </div>

                    <div class="container d-flex justify-content-between p-0 mt-4">
                            <div class="col-5">
                            <label class="fs-5 color-0491a3"> Nº do apto*</label> <br>
                            <select id="numero_apartamento" name="numero_apartamento" class="col-12 fs-5 p-2 border-select text-black rounded">
                                <option class="text-black"> 101 </option>
                                <option class="text-black"> 102 </option>
                                <option class="text-black"> 103 </option>
                                <option class="text-black"> 104 </option>
                                <option class="text-black"> 105 </option>
                                <option class="text-black"> 106 </option>
                            </select> 
                        </div>
                        <div class="col-5">
                            <label class="fs-5 color-0491a3"> Bloco*</label> <br>
                            <select id="bloco" name="bloco" class="col-12 fs-5 p-2 border-select text-black rounded">
                                <option class="text-black"> Amarelo </option>
                                <option class="text-black"> Azul </option>
                                <option class="text-black"> Roxo </option>
                                <option class="text-black"> Rosa </option>
                                <option class="text-black"> Laranja </option> 
                            </select> <br>  
                        </div> 
                    </div> 
                    <div class="text-end col-12 pt-4">
                        <input type="submit" value="Cadastrar" class="bg-005661 color-fff p-2 rounded border-0 col-12 col-md-6 col-xxl-3 hover-0491a3"></input>
                    </div>
                </div>
            </form>
            </div>         
        </section>

        <!-- Rodapé da página --> 
        <?php 
            include('footer.php');
        ?>
    </div>
</body>
</html>
