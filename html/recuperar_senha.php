<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title>Recuperar senha - Domos</title>
</head>
<body>
    <div class="fundo-imagem pb-5">
    <?php include('header.php'); ?>
        <!-- Formulário de recuperar senha -->
        <section class="d-block m-auto col-8 col-md-6 col-lg-5 col-xl-4 p-5 rborder4 formulario">
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
        <footer class="bg-005661 position-absolute w-100" style="bottom:0;">
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