<?php

require_once '30_DB_crud.php';

/*************************************************************
Objetivo: Classe responsável por representar todas as operações com o cliente do negócio.


Atributos:
$nome- nome do cliente
$cpf - cpf do cliente
$email - email do cliente
$senha - senha do cliente

Métodos:
insert - insere um cliente na tabela cliente
update - atualiza um cliente na tabela cliente

setNome - Atribui um nome ao cliente
getNome - Retorna o nome do cliente
setcpf - Atribui um cpf ao cliente
getcpf - Retorna o cpf ao cliente
setEmail - Atribui um email ao cliente
getEmail - Retorna o email do cliente
setsenha - Atribui uma senha ao cliente
getsenha - Retorn a senha do cliente
*************************************************************/

class Usuario extends CRUD{
	protected $table ='USUARIO';
	private $nome;
	private $cpf;
	private $email;
	private $senha;
	private $codigo_condominio; 
	private $nivel_permissao;
	private $codigo_moradia;
	
	/********Início dos métodos sets e gets*********/
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
		$this->senha = $senha;
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