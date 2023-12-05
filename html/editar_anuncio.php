<?php
    require_once('db/30_DB_crud.php');
    include_once('upload.php');
    if (isset($_POST["idAnuncio"]) && isset($_POST["titulo_ANUNCIO"]) && isset($_POST["descricao_ANUNCIO"]) && isset($_POST["tag"])){
        if ($_POST["tag"] == 0) {
            header('Location: ./perfil_morador.php');
        }
        $id = $_POST["idAnuncio"];
        $titulo = $_POST["titulo_ANUNCIO"];
        $descricao = $_POST["descricao_ANUNCIO"];
        $tag = $_POST["tag"];
        if (empty($valErr)){
            $sql = "INSERT INTO IMAGEM (endereco_imagem) VALUES (:imagem)
                RETURNING codigo_imagem";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(":imagem", $imglink);
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_BOTH);
            $codigo_imagem = $dados[0];

            $sql = "UPDATE ANUNCIO SET titulo = :titulo, descricao = :descricao, fk_tag_codigo_tag = :tag, fk_imagem_codigo_imagem = :codigo_imagem WHERE codigo_postagem = :codigo_postagem";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':codigo_postagem', $id);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':tag', $tag);
            $stmt->bindParam(':codigo_imagem', $codigo_imagem);
            $stmt->execute();
        }else{
            $sql = "UPDATE ANUNCIO SET titulo = :titulo, descricao = :descricao, fk_tag_codigo_tag = :tag  WHERE codigo_postagem = :codigo_postagem";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':codigo_postagem', $id);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':tag', $tag);
            $stmt->execute();
        }
        

        header('Location: ./perfil_morador.php');
    }
?>