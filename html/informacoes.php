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
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/informacoes.css"> 
    <link rel="stylesheet" href="css/style.css">
    <script src="js/sidebar.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Informações - Domos</title>
</head>
<body>
    <div class="grid-container">
        <!--Cabeçalho-->
        <header class="header d-flex align-items-center justify-content-between"> 
            <div class="menu-icon" onclick="openSidebar()">
                <span class=""><i class="fa-solid fa-bars color-subtitulo"></i></span>
            </div>
        </header>

      <!-- Navegação em abas pela barra lateral (sidebar) --> 
      <?php
            $_SELECTED = 7; 
            include("aside.php");
        ?>
            
        <main container class="main-container">
            <div class="table-responsive">
                <table class="table table-striped-columns align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="w-25"><i class="fa-solid fa-city color-titulo fs-1"></i></th>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <th scope="col">
                                        <p class="fs-3 color-titulo">Condomínio Residencial Vila Serena 
                                        <a href="editar_informacoes.php"><button class="btn"><i class="fa-solid fa-pen color-005661 fs-4"></i></button></p></a>
                                    </th>
                                </div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Cnpj</p></th>
                            <td class="color-descricao">37.647.184/0001-59</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Endereço</p></th>
                            <td class="color-descricao">12345-678, Serra - Avenida das Flores, 123</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Email</p></th>
                            <td class="color-descricao">condominioficticio@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Tipo de divisões</p></th>
                            <td class="color-descricao">Blocos</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Nome das divisões</p></th>
                            <td class="color-descricao">Cores</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Tipo de moradia</p></th>
                            <td class="color-descricao">Apartamentos</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Espaços para reservas</p></th>
                            <td class="color-descricao">Churrasqueira; Quadra; Área</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-sindico">Síndico(a)</p></th>
                            <td class="color-descricao">Zelma Regina - zelmaregina@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-administrador">Administrador(a)</p></th>
                            <td class="color-descricao">Camila Egydio - camilaegydio@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>