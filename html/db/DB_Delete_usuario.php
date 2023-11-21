<?php 
    require_once('30_DB_Usuario.php');
    include('../iniciar_sessao.php');
    $usuario = new Usuario();
    $usuario->delete($_SESSION['id']); // deleta os dados de onde o cpf for igual ao cpf id da sessão
    header('Location:../index.php'); // volta pra pagina inicial
?>