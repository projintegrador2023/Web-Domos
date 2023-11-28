<!-- NÃO UTILIZADO NESSE TRABALHO -->
<?php
    if(isset($_POST['envioPdf'])){
        $arquivo = $_FILES['file'];
        $arquivoNovo = explode('.', $arquivo['name']);
        if($arquivoNovo[sizeof($arquivoNovo)-1] != 'pdf'){
            die('Você não pode fazer upload desse tipo de arquivo. Faça upload de um PDF.');
        }else{
            move_uploaded_file($arquivo['tmp_name'],'upload/'.$arquivo['name']);
        }
    }
?>

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
                <span class=""><i class="fa-solid fa-bars color-0491a3"></i></span>
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
                            <th scope="col" class="w-25"><i class="fa-solid fa-city color-005661 fs-1"></i></th>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <td class="text-black"><input type="text" class="form-control" placeholder="Nome Condomínio: "></td>
                                </div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Cnpj</p></th>
                            <td class="text-black"><input type="text" class="form-control" placeholder="Cnpj: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Endereço</p></th>
                            <td class="text-black"><input type="text" class="form-control" placeholder="Endereço: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Email</p></th>
                            <td class="text-black"><input type="text" class="form-control" placeholder="Email: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Tipo de divisões</p></th>
                            <td class="text-black"><input type="text" class="form-control" placeholder="Tipo de divisões: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Nome das divisões</p></th>
                            <td class="text-black"><input type="text" class="form-control" placeholder="Nome das divisões: "></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Tipo de moradia</p></th>
                            <td class="text-black">                                
                                <select name="" id="" class="select-customiza form-control">
                                    <option selected class="">Escolha o tipo de moradia</option>
                                    <option value="" id="" class="">Casas</option>
                                    <option value="" id="" class="">Apartamentos</option>
                                    <option value="" id="" class="">Casas e apartamentos</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Regimento interno</p></th>
                            <td class="text-black">
                                <form class="d-flex" action="" method="POST" enctype="multipart/form-data">
                                    <input name="file" accept="application/pdf" type="file" class="form-control w-100">
                                    <input type="submit" name="envioPdf" value="Enviar arquivo" class="btn bg-0491a3 hover-0dc0d8 text-white ms-2">
                                </form>
                            </td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end col-12">
                    <input type="submit" name="envio" value="Salvar alterações" class="btn bg-0491a3 hover-0dc0d8 col-3 text-white">
                </div>
                <a href="informacoes.php">VOLTANDO TESTE</a>
            </div>
        </main>
    </div>
</body>
</html>