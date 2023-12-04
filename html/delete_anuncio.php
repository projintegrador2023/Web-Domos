<?php 
    require_once('db/30_DB_crud.php');
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM ANUNCIO WHERE codigo_postagem = :codigo_postagem";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':codigo_postagem', $id);
        $stmt->execute();
        header('Location: ./perfil_morador.php');
    }

?>