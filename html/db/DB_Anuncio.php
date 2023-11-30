<?php 
  require_once('30_DB_crud.php');
  class Anuncio extends CRUD {
    protected $table = 'ANUNCIO';
    private $data_hora_postagem;
    private $descricao;
    private $titulo;
    private $imagem = null;
    private $FK_USUARIO_cpf;
    private $FK_TAG_codigo_tag;
    private $FK_CONDOMINIO_codigo_condominio;

    // Métodos Set
    public function setDataHoraPostagem($data_hora_postagem) {
        $this->data_hora_postagem = $data_hora_postagem;
    }

    public function setCodigoImagem($imagem){
      $sql = "INSERT INTO IMAGEM (endereco_imagem) VALUES (:imagem)
                RETURNING codigo_imagem";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(":imagem", $imagem);
      $stmt->execute();
      $dados = $stmt->fetch(PDO::FETCH_BOTH);
      $codigo_imagem = $dados[0];
      $this->imagem = $codigo_imagem;
    }

    public function setCodigoCondominio(){
      $sql = "SELECT FK_CONDOMINIO_codigo_condominio from USUARIO WHERE cpf = :cpf";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(':cpf', $this->FK_USUARIO_cpf);
      $stmt->execute();
      $dados = $stmt->fetch(PDO::FETCH_BOTH);
      $codigo_condominio = $dados[0];
      $this->FK_CONDOMINIO_codigo_condominio = $codigo_condominio;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setFKUsuarioCpf($FK_USUARIO_cpf) {
        $this->FK_USUARIO_cpf = $FK_USUARIO_cpf;
        $this->setCodigoCondominio();
    }

    public function setFKTagCodigoTag($FK_TAG_codigo_tag) {
        $this->FK_TAG_codigo_tag = $FK_TAG_codigo_tag;
    }

    // Métodos Get
    public function getDataHoraPostagem() {
        return $this->data_hora_postagem;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getFKUsuarioCpf() {
        return $this->FK_USUARIO_cpf;
    }

    public function getFKTagCodigoTag() {
        return $this->FK_TAG_codigo_tag;
    }

    public function getCodigoCondominio(){
      return $this->FK_CONDOMINIO_codigo_condominio;
    }

    public function getImagem(){
      return $this->imagem;
    }

    public function insert(){
      $sql="INSERT INTO $this->table (data_hora_postagem, descricao, titulo, FK_USUARIO_cpf, FK_TAG_codigo_tag, FK_CONDOMINIO_codigo_condominio) 
                  VALUES (:data_hora_postagem, :descricao, :titulo, :FK_USUARIO_cpf, :FK_TAG_codigo_tag, :FK_CONDOMINIO_codigo_condominio)
                  RETURNING codigo_postagem";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(':data_hora_postagem', $this->data_hora_postagem);
      $stmt->bindParam(':descricao', $this->descricao);
      $stmt->bindParam(':titulo', $this->titulo);
      $stmt->bindParam(':FK_USUARIO_cpf', $this->FK_USUARIO_cpf);
      $stmt->bindParam(':FK_TAG_codigo_tag', $this->FK_TAG_codigo_tag, PDO::PARAM_INT);
      $stmt->bindParam('FK_CONDOMINIO_codigo_condominio', $this->FK_CONDOMINIO_codigo_condominio);
      $stmt->execute();
      $dados = $stmt->fetch(PDO::FETCH_BOTH);
      $codigo_postagem = $dados[0];

      if ($this->imagem != null){
        $sql_imagem = "INSERT INTO ANUNCIO_IMAGEM (fk_ANUNCIO_codigo_postagem, fk_IMAGEM_codigo_imagem)
        VALUES (:codigo_postagem, :codigo_imagem)";
        $stmt_imagem = Database::prepare($sql_imagem);
        $stmt_imagem->bindParam(":codigo_postagem", $codigo_postagem, PDO::PARAM_INT);
        $stmt_imagem->bindParam(":codigo_imagem", $this->imagem, PDO::PARAM_INT);
        $stmt_imagem->execute();
      }
    }
    
    /***************
    Objetivo: Atuliza um cliente pelo id
    Parâmetro de entrada: $id - id do cliente
    Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
    ***************/
    public function update($id){
      $sql="UPDATE $this->table SET nome = :nome, email = :email , senha = :senha  WHERE cpf = :cpf ";
      $stmt = Database::prepare($sql);
      //$stmt->bindParam(':nome', $this->nome);
      //$stmt->bindParam(':cpf', $this->cpf);
      //$stmt->bindParam(':email', $this->email);
      //$stmt->bindParam(':senha', $this->senha);
      //$stmt->bindParam(':codigo_condominio', $this->codigo_condominio);
      //$stmt->bindParam(':nivel_permissao', $this->nivel_permissao);
      //$stmt->bindParam(':codigo_moradia', $this->codigo_moradia);
      // $stmt->bindParam(':tipocliente', 1, PDO::PARAM_INT);
      return $stmt->execute();
    }
    
    public function find($id){
      $sql = "SELECT * FROM $this->table WHERE cpf = :id";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_BOTH);
    }
    
    public function delete($id){
      $sql = "DELETE FROM $this->table WHERE cpf = :id";
      $stmt = Database::prepare($sql);
      $stmt ->bindParam(':id', $id);
      return $stmt->execute();
    }
  }

?>