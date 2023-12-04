<?php
    include ("protect.php");
    require_once('db/DB_Condominio.php');
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
                    <?php
                        if (!isset($_SESSION)){
                            session_start();
                        }
                        $condominio = new Condominio();
                        $dados = $condominio->find($_SESSION['id']);

                        $sql_tipo_moradia = 'SELECT nome FROM TIPO_MORADIA WHERE codigo_tipo_moradia = :codigo_tipo_moradia';
                        $stmt = Database::prepare($sql_tipo_moradia);
                        $stmt->bindParam(':codigo_tipo_moradia', $dados[6], PDO::PARAM_INT);
                        $stmt->execute();
                        $rows = $stmt->fetch(PDO::FETCH_BOTH);
                        $tipo_moradia = $rows[0];

                        $sql_sindico = 'SELECT nome, email FROM USUARIO WHERE fk_condominio_codigo_condominio = :codigo_condominio AND fk_nivel_permissao_codigo_nivel_permissao = 1';
                        $stmt = Database::prepare($sql_sindico);
                        $stmt->bindParam('codigo_condominio', $dados[2]);
                        $stmt->execute();
                        $rows_sindico = $stmt->fetch(PDO::FETCH_BOTH);
                        $nome_sindico = $rows_sindico[0];
                        $email_sindico = $rows_sindico[1];

                        $sql_adm = 'SELECT nome, email FROM USUARIO WHERE fk_condominio_codigo_condominio = :codigo_condominio AND fk_nivel_permissao_codigo_nivel_permissao = 2';
                        $stmt = Database::prepare($sql_adm);
                        $stmt->bindParam('codigo_condominio', $dados[2]);
                        $stmt->execute();
                        $rows_adm = $stmt->fetch(PDO::FETCH_BOTH);
                        $nome_adm = $rows_adm[0];
                        $email_adm = $rows_adm[1];

                        echo '<thead>
                        <tr>
                            <th scope="col" class="w-25"><i class="fa-solid fa-city color-005661 fs-1"></i></th>
                            <th scope="col">
                                <div clsss="d-flex">
                                    <p class="fs-3 color-005661">' . $dados[1] .'
                                    <a href="editar_informacoes.php"><button class="btn bg-005661  rounded-circle"><i class="fa-solid fa-pen white fs-4 mt-1"></i></button></p></a>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Código de condomínio</p></th>
                            <td class="text-black">' . $dados[2] . '</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Cnpj</p></th>
                            <td class="text-black">' . $_SESSION['id'] . '</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Email</p></th>
                            <td class="text-black">' . $dados[3] . '</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-0491a3">Tipo de moradia</p></th>
                            <td class="text-black">'. $tipo_moradia . '</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-sindico">Síndico(a)</p></th>
                            <td class="text-black">'. $nome_sindico .  ' - '. $email_sindico . '</td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="color-administrador">Administrador(a)</p></th>
                            <td class="text-black">' . $nome_adm . ' - ' . $email_adm . '</td>
                        </tr>';
                        
                    ?>
                    
                    </tbody>
                </table>
            </div>
            <?php 
                echo "<a href='logout.php' class='btn btn-saida text-white'><i class='fa-solid fa-right-from-bracket flex-grow-1'></i> Encerrar sessão</a>";
            ?>
        </main>
    </div>
</body>
</html>