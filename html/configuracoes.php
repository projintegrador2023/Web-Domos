<!-- NÃO UTILIZADO NESSE TRABALHO -->


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
    <link rel="stylesheet" href="css/perfil.css"> 
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Configurações - Domos</title>
</head>
<body>
    <div class="grid-container">
        <aside class="sidebar gradient-custom"> 
            <div class="sidebar-title d-flex p-3 flex-column align-items-end">
                <span class="pt-3 px-3" onclick="closeSidebar()">
                    <i class="fa-solid fa-xmark fs-1"></i>
                </span>

                <div class="sidebar-brand">
                    <img src="css/img/logo_branca_icon.png" class="img-fluid" style="height: 14rem; width: 14rem;">
                </div>
            
            </div>
            
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="informacoes.php"> <div><i class="fa-solid fa-circle-info col-2"></i> Informações </div></a>
                </li>
                <li class="sidebar-list-item bg-customiza">
                    <a href="moradores.php"> <div><i class="fa-solid fa-people-roof col-2"></i> Moradores </div></a>
                </li>
                <li class="sidebar-list-item">
                    <a href="areas_reservadas.php"> <div><i class="fa-solid fa-calendar-check col-2"></i>Espaços reservados </div></a>
                </li>
                <li class="sidebar-list-item" id="encerrar">
                    <a href="index.php"> <div><i class="fa-solid fa-right-from-bracket col-2"></i>Encerrar sessão </div></a>
                </li> 
            </ul>
        </aside>

</body>
</html>