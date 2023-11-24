<?php

require_once '30_DB_crud.php';

class Endereco extends CRUD{
	protected $table ='Endereco';
	private $cep;
	private $estado;
	private $cidade;
  	private $bairro;
  	private $rua;
  	private $numero;
  	private $complemento;

	public function set_cep($cep){
		$this->cep = $cep;
	}

	public function get_cep(){
		return $this->cep;
	}

	public function set_estado($estado){
		$sql = "SELECT codigo_estado FROM ESTADO WHERE uf = '$estado';";
		$stmt = Database::prepare($sql);
		$stmt->execute();
		$dados = $stmt->fetch(PDO::FETCH_BOTH);
		$this->estado = $dados[0];
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
		$bairro = $this->insert_bairro();
		$sql="INSERT INTO $this->table (cep, numero, desc_logradouro, complemento, FK_BAIRRO_codigo_bairro) VALUES (:cep, :numero, :rua, :complemento, :bairro);";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':cep', $this->cep);
		$stmt->bindParam(':rua', $this->rua);
		$stmt->bindParam(':numero', $this->numero);
		$stmt->bindParam(':complemento', $this->complemento);
		$stmt->bindParam(':bairro', $bairro, PDO::PARAM_INT);
		if ($stmt->execute()){
			$sql_endereco = "SELECT codigo_endereco FROM ENDERECO WHERE cep = :cep AND numero = :numero AND desc_logradouro = :rua AND complemento = :complemento AND fk_bairro_codigo_bairro = :bairro";
			$stmt = Database::prepare($sql_endereco);
			$stmt->bindParam(':cep', $this->cep);
			$stmt->bindParam(':rua', $this->rua);
			$stmt->bindParam(':numero', $this->numero);
			$stmt->bindParam(':complemento', $this->complemento);
			$stmt->bindParam(':bairro', $bairro, PDO::PARAM_INT);
			$stmt->execute();
			$dados = $stmt->fetch(PDO::FETCH_BOTH);
			return $dados[0];
		} else{
			return null;
		}
		
	}

	public function insert_cidade(){
		$sql_cidade = "SELECT codigo_cidade FROM CIDADE WHERE nome = :cidade AND FK_ESTADO_codigo_estado = :estado";
		$stmt_cidade = Database::prepare($sql_cidade);
		$stmt_cidade->bindParam(':cidade', $this->cidade);
		$stmt_cidade->bindParam(':estado', $this->estado, PDO::PARAM_INT);
		$stmt_cidade->execute();
		if ($stmt_cidade->rowCount() > 0){
			$dados = $stmt_cidade->fetch(PDO::FETCH_BOTH);
			return $dados[0];
		} else{
			$sql = "INSERT INTO CIDADE (nome, FK_ESTADO_codigo_estado) VALUES (:cidade, :estado);";
			$stmt = Database::prepare($sql);
			$stmt->bindParam(':estado', $this->estado, PDO::PARAM_INT);
			$stmt->bindParam(':cidade', $this->cidade);
			$stmt->execute();
			$stmt_cidade->execute();
			$dados = $stmt_cidade->fetch(PDO::FETCH_BOTH);
			return $dados[0];
		}
	}
	public function insert_bairro(){
		$codigo_cidade = $this->insert_cidade();
		$sql_bairro = "SELECT codigo_bairro FROM BAIRRO WHERE nome = :bairro AND FK_CIDADE_codigo_cidade = :cidade";
		$stmt_bairro = Database::prepare($sql_bairro);
		$stmt_bairro->bindParam(':bairro', $this->bairro);
		$stmt_bairro->bindParam(':cidade', $codigo_cidade, PDO::PARAM_INT);
		$stmt_bairro->execute();
		if ($stmt_bairro->rowCount() > 0){
			$dados = $stmt_bairro->fetch(PDO::FETCH_BOTH);
			return $dados[0];
		} else {
			$sql = "INSERT INTO BAIRRO (nome, FK_CIDADE_codigo_cidade) VALUES (:bairro, :cidade)";
			$stmt = Database::prepare($sql);
			$stmt->bindParam(':bairro', $this->bairro);
			$stmt->bindParam(':cidade', $codigo_cidade, PDO::PARAM_INT);
			$stmt->execute();

			$stmt_bairro->execute();
			$dados = $stmt_bairro->fetch(PDO::FETCH_BOTH);
			return $dados[0];
		}
	}
	
	/***************
	Objetivo: Atuliza um cliente pelo id
	Parâmetro de entrada: $id - id do cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function update($id){
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
	}
	
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