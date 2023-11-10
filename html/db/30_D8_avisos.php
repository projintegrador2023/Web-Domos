<?php

require_once '30_DB_crud.php';

class Postagem extends CRUD{
	protected $table ='POSTAGEM';
	private $titulo;
	private $descricao;
	private $datahora;
	private $usuario;
	
	/********Início dos métodos sets e gets*********/
	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDatahora($datahora){
		$this->datahora = $datahora;
	}
	
	public function getDatahora(){
		return $this->datahora;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	
	public function getUsuario(){
		return $this->usuario;
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
		$sql="INSERT INTO $this->table (nome,cpf,email,senha,FK_CONDOMINIO_codigo_condominio, FK_NIVEL_PERMISSAO_codigo_nivel_permissao, FK_MORADIA_codigo_moradia) VALUES (:nome,:cpf,:email,:senha,:codigo_condominio,:nivel_permissao,:codigo_moradia)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':codigo_condominio', $this->codigo_condominio);
		$stmt->bindParam(':nivel_permissao', $this->nivel_permissao);
		$stmt->bindParam(':codigo_moradia', $this->codigo_moradia);
		
		return $stmt->execute();
	}
	
	/***************
	Objetivo: Atuliza um cliente pelo id
	Parâmetro de entrada: $id - id do cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function update($id){
		$sql="UPDATE $this->table SET nome = :nome, email = :email , senha = :senha,  WHERE cpf = :cpf ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':codigo_condominio', $this->codigo_condominio);
		$stmt->bindParam(':nivel_permissao', $this->nivel_permissao);
		$stmt->bindParam(':codigo_moradia', $this->codigo_moradia);
		// $stmt->bindParam(':tipocliente', 1, PDO::PARAM_INT);
		return $stmt->execute();
	}
	
	
	
	
		
	
}


?>