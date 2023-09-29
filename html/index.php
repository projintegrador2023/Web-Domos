<?php 
    $_INDEX_PAGE = true;
?>

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
        <?php include('header.php'); ?>

        <div class="m-5">
            <!-- Título da página --> 
        <section class = "d-flex justify-content-center align-items-center mb-5 px-2 px-sm-0"> 
            <h1 class="center-text fs-1 text-white px-0"> Bem vindo ao seu site de condomínio, Domos! </h1>
        </section>
        
        <!-- Botões da página --> 
        <section class = "d-flex justify-content-center align-items-center m-auto mb-5">
            <a class="text-center" href="cadastrar_usuario.php"><button class="bg-005661 color-fff p-3 rounded border-0 fs-4 col-10 col-sm-8 col-lg-10 hover-0491a3"> Cadastro do Morador </button></a>
            <p class="fs-4 col-1 p-0 text-center ms-0 ps-1 ps-sm-3 ps-lg-3 me-sm-0"> OU </p> 
            <a class="text-center" href="cadastro_condominio.php"> <button class=" bg-005661 color-fff p-3 rounded border-0 col-10 col-sm-8 col-lg-10 hover-0491a3 fs-4"> Cadastro do Condomínio </button> </a>
        </section>
        
        <!-- Texto (conteúdo) da página --> 
        <section class = "d-block justify-content-center align-items-center text text-justify fs-4 m-auto mb-5 col-10 col-lg-8 col-xl-7"> 
            <p class="text-white fw-200">
                A aplicação Domos tem se destacado como uma solução eficiente, atendendo às complexidades da comunicação e organização dentro de condomínios. 
                Por meio de sua plataforma intuitiva e recursos abrangentes, a Domos visa aprimorar a experiência dos 
                moradores e otimizar a gestão condominial. 
                Uma das principais vantagens oferecidas pela Domos é o acesso rápido e simplificado a informações relevantes. 
                A era digital trouxe consigo a necessidade de uma comunicação mais ágil e centralizada, e a Domos preenche 
                essa lacuna ao disponibilizar anúncios importantes e avisos essenciais diretamente 
                nos dispositivos dos moradores. Isso elimina a dependência de murais físicos garantindo que 
                todos os residentes estejam informados sobre os acontecimentos relevantes do condomínio. 
        
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
                        <i class="fa-solid fa-bag-shopping color-fdfdfd" style="font-size:8vh"></i>  
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
        <div class="d-flex justify-content-center col-12 text-lg-justify text-center" id="sobre_nos"> 
            <div class="d-lg-flex d-block col-10"> 
                <div class="col-10 col-lg-5 my-4 my-lg-5 ms-lg-5 m-auto">
                    <img src="css/img/foto_quemsomos.png" alt="Foto da equipe" style="width:70%">
                </div> 
            
                <div class="ms-lg-5">
                    <h1 class="mt-5 mb-3 text-lg-left"> Sobre nós </h1> 
                
                    <p class="fs-4 fw-200 text-justify">
                    Somos um time de estudantes de informática 
                    para internet do Ifes Campus Serra formado por Camila Egydio, Davi Nunes, 
                    Isabelly Andrades e Yasmin Santana. <br>
                    Estamos no último ano do curso, realizando o Projeto Integrador que 
                    abrange tudo que aprendemos ao longo desses três anos. Ficaremos felizes
                    com a utilização da aplicação, facilitando a vida em condomínio.</p>
                </div>
            </div>
        </div>
        
        <br> <br> 
        <?php include('footer.php'); ?>
</body>
</html>
