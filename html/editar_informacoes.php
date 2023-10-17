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
                                        <button class="btn"><i class="fa-solid fa-pen color-005661 fs-4"></i></button></p>
                                    </th>
                                </div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Cnpj</p></th>
                            <td class="color-descricao"><input type="text" class="form-control" placeholder="Cnpj: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Endereço</p></th>
                            <td class="color-descricao"><input type="text" class="form-control" placeholder="Endereço: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Email</p></th>
                            <td class="color-descricao"><input type="text" class="form-control" placeholder="Email: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Tipo de divisões</p></th>
                            <td class="color-descricao"><input type="text" class="form-control" placeholder="Tipo de divisões: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Nome das divisões</p></th>
                            <td class="color-descricao"><input type="text" class="form-control" placeholder="Nome das divisões: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Tipo de moradia</p></th>
                            <td class="color-descricao">                                
                                <select name="" id="" class="select-customiza form-control">
                                    <option selected class="">Escolha o tipo de moradia</option>
                                    <option value="" id="" class="">Casas</option>
                                    <option value="" id="" class="">Apartamentos</option>
                                    <option value="" id="" class="">Casas e apartamentos</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Espaços para reservas</p></th>
                            <td class="color-descricao"><input type="text" class="form-control" placeholder="Ex: Quadra;Churrasqueira;"></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-subtitulo">Regimento interno</p></th>
                            <td class="color-descricao"><input type="file" class="form-control" id="regimento_interno"></td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>