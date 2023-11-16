<?php 
    require_once('30_DB_Usuario.php');
    include('../iniciar_sessao.php');
    $usuario = new Usuario();
    $dados = $usuario->find($_SESSION['id']);
    $usuario->delete($dados[0]);
    header('Location:../index.php');
?>