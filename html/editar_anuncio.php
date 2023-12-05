<?php
    require_once('db/30_DB_crud.php');

    if (isset($_POST["idAnuncio"]) && isset($_POST["titulo_ANUNCIO"]) && isset($_POST["descricao_ANUNCIO"]) && isset($_POST["tag"])){
        if ($_POST["tag"] == 0) {
            header('Location: ./perfil_morador.php');
        }
        $id = $_POST["idAnuncio"];
        $titulo = $_POST["titulo_ANUNCIO"];
        $descricao = $_POST["descricao_ANUNCIO"];
        $tag = $_POST["tag"];

        $sql = "UPDATE ANUNCIO SET titulo = :titulo, descricao = :descricao, fk_tag_codigo_tag = :tag WHERE codigo_postagem = :codigo_postagem";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':codigo_postagem', $id);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':tag', $tag);
        $stmt->execute();

        header('Location: ./perfil_morador.php');
    }
?>