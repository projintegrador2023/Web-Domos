<?php

require_once '30_DB_crud.php';
require_once 'password.php';

class Usuario extends CRUD{
	protected $table ='USUARIO';
	private $nome;
	private $cpf;
	private $email;
	private $senha;
	private $codigo_condominio; 
	private $nivel_permissao;
	private $codigo_moradia;
	private $imagem = 3;
	
	/********Início dos métodos sets e gets*********/
	public function setImagem($imagem){
		$sql = "INSERT INTO IMAGEM (endereco_imagem) VALUES (:imagem)
                RETURNING codigo_imagem";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(":imagem", $imagem);
      $stmt->execute();
      $dados = $stmt->fetch(PDO::FETCH_BOTH);
      $codigo_imagem = $dados[0];
      $this->imagem = $codigo_imagem;
	}
	public function getImagem(){
		return $this->imagem;
	}

	public function setCodigoImagem($imagem){
		$this->imagem = $imagem;
	}
	public function getCodigoImagem($imagem){
		return $this->imagem;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getEmail(){
		return $this->email;
	}
	public function setSenha($senha){
		$this->senha = password_hash($senha, PASSWORD_DEFAULT);
	}
	
	public function getSenha(){
		return $this->senha;
	}
	
	public function setCodigoCondominio($codigo_condominio){
		$this->codigo_condominio = $codigo_condominio;
	}
	
	public function getCodigoCondominio(){
		return $this->codigo_condominio;
	}
	public function setNivelPermissao($nivel_permissao){
		$this->nivel_permissao = $nivel_permissao;
	}
	
	public function getNivelPermissao(){
		return $this->nivel_permissao;
	}

	public function setCodigoMoradia($codigo_moradia){
		$this->codigo_moradia = $codigo_moradia;
	}
	
	public function getCodigoMoradia(){
		return $this->codigo_moradia;
	}
	/********Fim dos métodos sets e gets*********/
	
	
	/***************
	Objetivo: Método que insere um cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
		$sql="INSERT INTO $this->table (nome,cpf,email,senha,FK_CONDOMINIO_codigo_condominio, FK_NIVEL_PERMISSAO_codigo_nivel_permissao, FK_MORADIA_codigo_moradia, fk_imagem_codigo_imagem)
		 VALUES (:nome,:cpf,:email,:senha,:codigo_condominio,:nivel_permissao,:codigo_moradia, :codigo_imagem)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':codigo_condominio', $this->codigo_condominio);
		$stmt->bindParam(':nivel_permissao', $this->nivel_permissao);
		$stmt->bindParam(':codigo_moradia', $this->codigo_moradia);
		$stmt->bindParam(':codigo_imagem', $this->imagem);
		
		return $stmt->execute();
	}
	
	/***************
	Objetivo: Atuliza um cliente pelo id
	Parâmetro de entrada: $id - id do cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function update($id){
		$sql="UPDATE $this->table SET nome = :nome, email = :email , senha = :senha, fk_imagem_codigo_imagem = :codigo_imagem, fk_moradia_codigo_moradia = :codigo_moradia  WHERE cpf = :cpf ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':codigo_imagem', $this->imagem);
		//$stmt->bindParam(':codigo_condominio', $this->codigo_condominio);
		//$stmt->bindParam(':nivel_permissao', $this->nivel_permissao);
		$stmt->bindParam(':codigo_moradia', $this->codigo_moradia);
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