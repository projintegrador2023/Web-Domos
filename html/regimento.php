<?php 
  include("protect.php");
  require_once('db/DB_Condominio.php');
  require_once('db/30_DB_Usuario.php');
    
  if ($_SESSION['tipo_usuario'] == 1){
    $usuario = new Usuario();
    $dados_usuario = $usuario->find($_SESSION['id']);
    $codigo_condominio = $dados_usuario[4];

    $sql = "SELECT regimento FROM CONDOMINIO WHERE codigo_condominio = :codigo_condominio";
    $stmt = Database::prepare($sql);
    $stmt->bindParam(':codigo_condominio', $codigo_condominio);
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_BOTH);
    $regimento = $dados[0];

  } else {
    $condominio = new Condominio();
    $dados_condominio = $condominio->find($_SESSION['id']);
    $codigo_condominio = $dados_condominio[2];

    $sql = "SELECT regimento FROM CONDOMINIO WHERE codigo_condominio = :codigo_condominio";
    $stmt = Database::prepare($sql);
    $stmt->bindParam(':codigo_condominio', $codigo_condominio);
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_BOTH);
    $regimento = $dados[0];
  }
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
            <div class="d-flex w-25">
              <?php
                echo '<a href="'. $regimento .'" class="btn baixar-btn rounded-5 w-75 m-2 fs-6" download>Baixar PDF</a>'
              ?>
              
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
                  <?php
                    echo '<embed src="' . $regimento . '" class="col-12 h-100" type="application/pdf">';
                  ?>
                    
                </div>
            </div>       
        </main>
    </div>
    
</body>
</html>