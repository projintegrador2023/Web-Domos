<?php 
  include("iniciar_sessao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/regimento.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/sidebar.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Regimento - Domos </title>
</head>

<body>
    <!-- Container -->
    <div class="grid-container">
        <!--Cabeçalho de pesquisa e filtros-->
        <header class="header d-flex align-items-center justify-content-between m-3"> 
            <div class="menu-icon" onclick="openSidebar()">
            <span class=""><i class="fa-solid fa-bars titulo-sub"></i></span>
            </div>
            <div class="d-flex w-75 ">
              <button class="btn"><i class="fa-solid fa-magnifying-glass search-btn"></i></button>
              <input type="text" class="search ps-3 m-lg-2 w-100" placeholder="Pesquisar...">
            </div>
            
            <div class="justify-content-around d-flex w-25">
              <button class="btn baixar-btn rounded-5 w-75 m-2 fs-6" type="button">Baixar PDF</button>
            </div>
        </header>

        <?php
      $_SELECTED = 4; 
      include("aside.php");
    ?>
         
        <!-- Main principal (container)--> 
        <main class="main-container"> 
            <div class="card m-2 h-100 shadow-black">
                <div class="h-100">
                    <embed src="teste.pdf" class="col-12 h-100" type='application/pdf'>
                </div>
            </div>       
        </main>
    </div>
    
</body>
</html>