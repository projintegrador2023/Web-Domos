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
    <link rel="stylesheet" href="css/informacoes.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <script src="js/sidebar.js" defer></script>
    <script src="js/script.js" defer></script>
    
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Moradores - Domos</title>
</head>
<body>
    
    <div class="grid-container">
        <!--Cabeçalho-->
        <header class="header d-flex align-items-center justify-content-between m-3"> 
            <div class="menu-icon" onclick="openSidebar()">
                <span class=""><i class="fa-solid fa-bars color-subtitulo"></i></span>
            </div>
        </header>

        <?php
            $_SELECTED = 7; 
            include("aside.php");
        ?>

        <main class="main-container">

            <div class="row justify-content-center col-12">

                <div class="col-lg-10 col-xl-5 col-11 px-0 m-1"> 
                    <div class="rounded col-12 d-flex flex-column my-2">
                        <div class="bg-0491a3 d-flex justify-content-between accordion-cabecalho"> 
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
                        <div id="lista" class="bg-ffffff accordion-conteudo">
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Bloco: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Número: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Cpf: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> E-mail: </p>
                        </div>
                    </div>

                    <div class="rounded col-12 d-flex flex-column my-2">
                        <div class="bg-0491a3 d-flex justify-content-between accordion-cabecalho"> 
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
                        <div id="lista" class="bg-ffffff accordion-conteudo">
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Bloco: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Número: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Cpf: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> E-mail: </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 col-xl-5 col-11 px-0 m-1"> 
                    <div class="rounded col-12 d-flex flex-column my-2">
                        <div class="bg-0491a3 d-flex justify-content-between accordion-cabecalho"> 
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
                        <div id="lista" class="bg-ffffff accordion-conteudo">
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Bloco: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Número: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Cpf: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> E-mail: </p>
                        </div>
                    </div>

                    <div class="rounded col-12 d-flex flex-column my-2">
                        <div class="bg-0491a3 d-flex justify-content-between accordion-cabecalho"> 
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
                        <div id="lista" class="bg-ffffff accordion-conteudo">
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Bloco: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Número: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> Cpf: </p>
                            <p class="p-2 mb-0 color-0491a3 border-bottom"> E-mail: </p>
                        </div>
                    </div>
                </div>
                </div>

            </div>

        </main>
    
    </div>



        <script>
        var acc = document.getElementsByClassName("accordion-cabecalho");
            var i;
                
            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");
                
                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
                });
            }
        </script>

</body>
</html>
