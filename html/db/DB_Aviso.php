<?php 
  require_once('30_DB_crud.php');
  class Aviso extends CRUD {
    protected $table = 'AVISO';
    private $data_hora_postagem;
    private $descricao;
    private $titulo;
    private $FK_USUARIO_cpf;
    private $FK_IMPORTANCIA_codigo_importancia;

    // Métodos Set
    public function setDataHoraPostagem($data_hora_postagem) {
        $this->data_hora_postagem = $data_hora_postagem;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setFKUsuarioCpf($FK_USUARIO_cpf) {
        $this->FK_USUARIO_cpf = $FK_USUARIO_cpf;
    }

    public function setFKImportanciaCodigoImportancia($FK_IMPORTANCIA_codigo_importancia) {
        $this->FK_IMPORTANCIA_codigo_importancia = $FK_IMPORTANCIA_codigo_importancia;
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

    public function getFKImportanciaCodigoImportancia() {
        return $this->FK_IMPORTANCIA_codigo_importancia;
    }

    public function insert(){
      $sql="INSERT INTO $this->table (data_hora_postagem, descricao, titulo, FK_USUARIO_cpf, FK_IMPORTANCIA_codigo_importancia) 
                  VALUES (:data_hora_postagem, :descricao, :titulo, :FK_USUARIO_cpf, :FK_IMPORTANCIA_codigo_importancia)";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(':data_hora_postagem', $this->data_hora_postagem);
      $stmt->bindParam(':descricao', $this->descricao);
      $stmt->bindParam(':titulo', $this->titulo);
      $stmt->bindParam(':FK_USUARIO_cpf', $this->FK_USUARIO_cpf);
      $stmt->bindParam(':FK_IMPORTANCIA_codigo_importancia', $this->FK_IMPORTANCIA_codigo_importancia, PDO::PARAM_INT);
      return $stmt->execute();
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