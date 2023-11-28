<?php 
//recebe o usuario meio preenchido da ultima pagina
    require_once("../html/db/30_DB_Usuario.php");
    require_once("../html/db/DB_Condominio.php");
    if(!isset($_SESSION)){
        session_start();
    }

    if (isset($_POST['botao_cadastrar'])){
        $usuario = $_SESSION['usuario']; // recebe o usuario da sessao de cadastro 1

        if ($_POST['numero_apartamento'] != 'Escolha uma opção' && $_POST['bloco'] != 'Escolha uma opção'){
            $sql_bloco = "SELECT codigo_divisao FROM DIVISAO WHERE desc_divisao = :divisao";
            $stmt = Database::prepare($sql_bloco);
            $stmt->bindParam(':divisao', $_POST['bloco']);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_BOTH);
            $codigo_divisao = $dados[0][0];
            echo $codigo_divisao;

            $sql_moradia = "SELECT codigo_moradia FROM MORADIA WHERE numero_moradia = :numero AND fk_divisao_codigo_divisao = :codigo_divisao";
            $stmt = Database::prepare($sql_moradia);
            $stmt->bindParam(":numero", $_POST["numero_apartamento"]);
            $stmt->bindParam(':codigo_divisao', $codigo_divisao, PDO::PARAM_INT);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_BOTH);
            $codigo_moradia = $dados[0][0];

            $usuario->setCodigoMoradia($codigo_moradia);
            try{
                $usuario->insert(); // insere o usuario no banco
                $_SESSION['id'] = $usuario->getCpf();
                $_SESSION['tipo_usuario'] = 1;
                header("Location: ./avisos.php");
            } catch (Exception $e) { // se algo der errado, mostra um alerta js para reinserir os dados
                echo '<script>  
                    alert("Algo deu errado, verifique seus dados e tente novamente.");
                </script>';
            }
        } else{
            echo '<script>  
                    alert("Escolha uma moradia válida.");
                </script>';
        } 
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
                                <?php 
                                    $usuario = $_SESSION['usuario'];
                                    $codigo_condominio = $usuario->getCodigoCondominio();
                                    $sql = "SELECT numero_moradia FROM MORADIA WHERE fk_condominio_codigo_condominio = :codigo_condominio";
                                    $stmt = Database::prepare($sql);
                                    $stmt->bindParam(':codigo_condominio', $codigo_condominio);
                                    $stmt->execute();
                                    $numeros = $stmt->fetchAll(PDO::FETCH_BOTH);
                                    
                                    echo "<option class='text-black'>"; 
                                    echo $numeros[0][0];
                                    echo "</option>";

                                    $i = 1;
                                    while ($numeros[$i][0] != $numeros[0][0]){
                                        echo "<option class='text-black'>"; 
                                        echo $numeros[$i][0];
                                        echo "</option>";
                                        $i++;
                                    }
                                ?>
                            </select> 
                        </div>
                        <div class="col-5">
                            <label class="fs-5 color-0491a3"> Bloco*</label> <br>
                            <select id="bloco" name="bloco" class="col-12 fs-5 p-2 border-select text-black rounded">
                                <option class="text-black"> Escolha uma opção </option>
                                <?php 
                                    if (!isset($_SESSION)){
                                        session_start();
                                    }
                                    $usuario = $_SESSION['usuario'];
                                    $codigo_condominio = $usuario->getCodigoCondominio();
                                    $sql = "SELECT desc_divisao FROM divisao WHERE fk_condominio_codigo_condominio = :codigo_condominio";
                                    $stmt = Database::prepare($sql);
                                    $stmt->bindParam(':codigo_condominio', $codigo_condominio);
                                    $stmt->execute();
                                    $divisoes = $stmt->fetchAll(PDO::FETCH_BOTH);
                                    for ($i = 0; $i < $stmt->rowCount(); $i++){
                                        echo "<option class='text-black'>"; 
                                        echo $divisoes[$i][0];
                                        echo "</option>";
                                    }
                                ?>
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
