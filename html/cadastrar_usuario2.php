<?php 
//insere o usuario
    

    if($usuario->insert()){
        if (!isset($_SESSION)){
            session_start();
            $_SESSION['id'] = $usuario->getCpf();
            $_SESSION['tipo_usuario'] = 1;
            header("Location: ../avisos.php");
        }
    } else{
        echo '<script>
            alert("Algo deu errado, verifique seus dados novamente.");
        </script>';
    }
?>

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
            <form class="" action="" method="POST">
                
                <div class="formulario mx-3 px-5 py-4" id="div_informacoes_condominio">
                    <div class="d-flex justify-content-center">
                        <h1 class="color-0491a3 ms-4 fs-2 text-center"> Cadastro da moradia </h1>
                    </div>

                    <div class="container d-flex justify-content-between p-0 mt-4">
                        <div class="col-5">
                            <label class="fs-5 color-0491a3"> Nº do apto*</label> <br>
                            <select id="numero_apartamento" name="numero_apartamento" class="col-12 fs-5 p-2 border-select text-black rounded">
                                <option class="text-black"> Escolha uma opção </option>
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
                                <option class="text-black"> Escolha uma opção </option>
                                <option class="text-black"> Amarelo </option>
                                <option class="text-black"> Azul </option>
                                <option class="text-black"> Roxo </option>
                                <option class="text-black"> Rosa </option>
                                <option class="text-black"> Laranja </option> 
                            </select> <br>  
                        </div> 
                    </div> 
                    <div class="text-end col-12 pt-4">
                        <input type="submit" name="botao_cadastrar" value="Cadastrar" class="bg-005661 color-fff p-2 rounded border-0 col-12 col-md-6 col-xxl-3 hover-0491a3"></input>
                    </div>
                </div>
            </form>
                    
        </section>
    </div> 
        <!-- Rodapé da página --> 
        <?php 
            include('footer.php');
        ?>
</body>
</html>
