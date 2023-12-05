<?php
    include('protect.php');
    require_once('db/DB_Condominio.php');
    $condominio = new Condominio();
    $dados_condominio = $condominio->find($_SESSION['id']);
    $nome = $dados_condominio[1];
    $codigo_condominio = $dados_condominio[2];
    $email = $dados_condominio[3];

    
    if(isset($_POST['envioPdf'])){
        $arquivo = $_FILES['file'];
        $arquivoNovo = explode('.', $arquivo['name']);
        if($arquivoNovo[sizeof($arquivoNovo)-1] != 'pdf'){
            die('Você não pode fazer upload desse tipo de arquivo. Faça upload de um PDF.');
        }else{
            $arquivo['name'] = 'Regimento' . $codigo_condominio . '.pdf';
            $nome_arquivo = './upload/' . $arquivo['name'];
            if (file_exists($nome_arquivo)){
                unlink($nome_arquivo);
                echo move_uploaded_file($arquivo['tmp_name'],'./upload/'.$arquivo['name']);
            } else {
                move_uploaded_file($arquivo['tmp_name'],'./upload/'.$arquivo['name']);
                $sql = "UPDATE CONDOMINIO SET regimento = :arquivo WHERE codigo_condominio = :codigo_condominio";
                $stmt = Database::prepare($sql);
                $stmt->bindParam(':arquivo', $nome_arquivo);
                $stmt->bindParam(':codigo_condominio', $codigo_condominio);
                $stmt->execute();
            }
        }
    }

    if (isset($_POST['envio'])){
        $condominio->setCodigo_condominio($codigo_condominio);
        $condominio->setNome($_POST['nome']);
        $condominio->setEmail($_POST['email']);
        if (!empty($_POST['senha']) && !empty($_POST['conf_senha']) && $_POST['senha'] == $_POST['conf_senha'] && $_POST['moradia'] != 'Escolha o tipo de moradia'){
            $condominio->setSenha($_POST['senha']);
            $sql = "SELECT codigo_tipo_moradia FROM TIPO_MORADIA WHERE nome = :nome";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $_POST['moradia']);
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_BOTH);
            $condominio->setTipo_moradia($dados[0]);
            $condominio->update($codigo_condominio);
            header('Location: ./informacoes.php');
        }
        if ($_POST['sindico'] != 'Escolha o síndico'){
            $sql = "SELECT * FROM USUARIO WHERE fk_nivel_permissao_codigo_nivel_permissao = 1 AND fk_condominio_codigo_condominio = :codigo_condominio";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':codigo_condominio', $codigo_condominio);
            $stmt->execute();
            if ($stmt->rowCount() > 0){
                $sql = "UPDATE USUARIO SET fk_nivel_permissao_codigo_nivel_permissao = 3 WHERE fk_nivel_permissao_codigo_nivel_permissao = 1 AND fk_condominio_codigo_condominio = :codigo_condominio";
                $stmt = Database::prepare($sql);
                $stmt->bindParam(':codigo_condominio', $codigo_condominio);
                $stmt->execute();
            }
            
            $sql = "UPDATE USUARIO SET fk_nivel_permissao_codigo_nivel_permissao = 1 WHERE cpf = :cpf";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':cpf' ,$_POST['sindico']);
            $stmt->execute();
        }
        if ($_POST['adm'] != 'Escolha o administrador'){
            $sql = "SELECT * FROM USUARIO WHERE fk_nivel_permissao_codigo_nivel_permissao = 2 AND fk_condominio_codigo_condominio = :codigo_condominio";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':codigo_condominio', $codigo_condominio);
            $stmt->execute();
            if ($stmt->rowCount() > 0){
                $sql = "UPDATE USUARIO SET fk_nivel_permissao_codigo_nivel_permissao = 3 WHERE fk_nivel_permissao_codigo_nivel_permissao = 2 AND fk_condominio_codigo_condominio = :codigo_condominio";
                $stmt = Database::prepare($sql);
                $stmt->bindParam(':codigo_condominio', $codigo_condominio);
                $stmt->execute();
            }

            $sql = "UPDATE USUARIO SET fk_nivel_permissao_codigo_nivel_permissao = 2 WHERE cpf = :cpf";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':cpf' ,$_POST['adm']);
            $stmt->execute();
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
                <form action="" method="POST">
                    <table class="table table-striped-columns align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" class="w-25"><i class="fa-solid fa-city color-005661 fs-1"></i></th>
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <?php 
                                                echo '<td class="text-black"><input type="text" name="nome" class="form-control" value="'. $nome .'"></td>'
                                            ?>
                                            
                                        </div>
                                    </div>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><p class="color-0491a3">Email</p></th>
                                    <?php 
                                        echo '<td class="text-black"><input type="text" name="email" class="form-control" value="' . $email . '"></td>';
                                    ?>

                                    
                                </tr>
                                <tr>
                                    <th scope="row"><p class="color-0491a3">Senha</p></th>
                                    <td class="text-black"><input type="password" name="senha" class="form-control" placeholder=""></td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="color-0491a3">Confirmar Senha</p></th>
                                    <td class="text-black"><input type="password" name="conf_senha" class="form-control" placeholder=""></td>
                                </tr>
                                <!--tr>
                                    <th scope="row"><p class="color-0491a3">Nome das divisões</p></th>
                                    <td class="text-black"><input type="text" class="form-control" placeholder="Nome das divisões: "></td>
                                </tr-->
                                <tr>
                                    <th scope="row"><p class="color-0491a3">Tipo de moradia</p></th>
                                    <td class="text-black">                                
                                        <select name="moradia" id="" class="select-customiza form-control">
                                            <option selected class="">Escolha o tipo de moradia</option>
                                            <?php 
                                                $sql = "SELECT nome FROM TIPO_MORADIA";
                                                $stmt = Database::prepare($sql);
                                                $stmt->execute();
                                                $nome = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                for ($i = 0; $i < $stmt->rowCount(); $i++){
                                                    echo "<option class='text-black'>"; 
                                                    echo $nome[$i][0];
                                                    echo "</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="color-0491a3">Síndico</p></th>
                                    <td class="text-black">
                                        <select name="sindico" class="select-customiza form-control"> 
                                            <option class="text-black">Escolha o síndico</option>
                                            <?php
                                                $sql = "SELECT cpf, nome FROM USUARIO WHERE fk_condominio_codigo_condominio = :codigo_condominio
                                                        ORDER BY nome ASC";
                                                $stmt = Database::prepare($sql);
                                                $stmt->bindParam(':codigo_condominio', $codigo_condominio);
                                                $stmt->execute();
                                                $usuarios = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                for ($i = 0; $i < $stmt->rowCount(); $i++){
                                                    echo "<option class='text-black' value='". $usuarios[$i][0] ."'>" . $usuarios[$i][0] . " - " . $usuarios[$i][1] . "</option>";
                                                }
                                            ?>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="color-0491a3">Administrador</p></th>
                                    <td class="text-black">
                                        <select name="adm" class="select-customiza form-control"> 
                                            <option class="text-black">Escolha o administrador</option>
                                            <?php
                                                for ($i = 0; $i < $stmt->rowCount(); $i++){
                                                    echo "<option class='text-black' value='". $usuarios[$i][0] ."'>" . $usuarios[$i][0] . " - " . $usuarios[$i][1] . "</option>";
                                                }
                                            ?>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><p class="color-0491a3">Regimento interno</p></th>
                                    <td class="text-black d-flex">
                                        <form class="" action="" method="POST" enctype="multipart/form-data">
                                            <input name="file" accept="application/pdf" type="file" class="w-75 form-control">
                                            <input type="submit" name="envioPdf" value="Confirmar" class="w-25 ms-2 btn bg-0491a3 hover-0dc0d8 text-white">
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        
                    </table>
                    <div class="d-flex justify-content-end col-12">
                        <input type="submit" name="envio" value="Salvar alterações" class="btn bg-0491a3 hover-0dc0d8 col-3 text-white">
                        <!-- <a href="informacoes.php" class="btn bg-0491a3 hover-0dc0d8 col-3 text-white">Salvar Alterações</a> -->
                    </div>
                </form>  
            </div>
        </main>
    </div>
</body>
</html>