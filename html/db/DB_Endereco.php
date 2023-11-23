<?php

require_once '30_DB_crud.php';

class Endereco extends CRUD{
	protected $table ='Endereco';
  private $estado;
  private $cidade;
  private $bairro;
  private $rua;
  private $numero;
  private $complemento;

  public function set_estado($estado){
    $this->estado = $estado;
  }
  public function set_cidade($cidade){
    $this->cidade = $cidade;
  }
  public function set_bairro($bairro){
    $this->bairro = $bairro;
  }
  public function set_rua($rua){
    $this->rua = $rua;
  }
  public function set_numero($numero){
    $this->numero = $numero;
  }
  public function set_complemento($complemento){
    $this->complemento = $complemento;
  }
  public function get_estado(){
    return $this->estado;
  }
  public function get_cidade(){
    return $this->cidade;
  }
  public function get_bairro(){
    return $this->bairro;
  }
  public function get_rua(){
    return $this->rua;
  }
  public function get_numero(){
    return $this->numero;
  }
  public function get_complemento(){
    return $this->complemento;
  }


	/********Fim dos métodos sets e gets*********/
	
	
	/***************
	Objetivo: Método que insere um cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
    if 



		$sql=" INSERT INTO
    
    
    INSERT INTO $this->table ()";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':estado', $this->estado);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':rua', $this->rua);
		$stmt->bindParam(':numero', $this->numero);
		$stmt->bindParam(':complemento', $this->complemento);
		
		return $stmt->execute();
	}
	
	/***************
	Objetivo: Atuliza um cliente pelo id
	Parâmetro de entrada: $id - id do cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	//public function update($id){
		//$sql="UPDATE $this->table SET nome = :nome, email = :email , senha = :senha  WHERE cpf = :cpf ";
		//$stmt = Database::prepare($sql);
		//$stmt->bindParam(':nome', $this->nome);
		//$stmt->bindParam(':cpf', $this->cpf);
		//$stmt->bindParam(':email', $this->email);
		//$stmt->bindParam(':senha', $this->senha);
		//$stmt->bindParam(':codigo_condominio', $this->codigo_condominio);
		//$stmt->bindParam(':nivel_permissao', $this->nivel_permissao);
		//$stmt->bindParam(':codigo_moradia', $this->codigo_moradia);
		// $stmt->bindParam(':tipocliente', 1, PDO::PARAM_INT);
		//return $stmt->execute();
	//}
	
	public function find($id){
		$sql = "SELECT * FROM $this->table WHERE codigo_endereco = :id";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_BOTH);
	}
	
	public function delete($id){
		$sql = "DELETE FROM $this->table WHERE codigo_endereco = :id";
		$stmt = Database::prepare($sql);
		$stmt ->bindParam(':id', $id);
		return $stmt->execute();
	}
		
	
}

?>