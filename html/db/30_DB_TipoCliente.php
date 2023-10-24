<?php

require_once '30_DB_crud.php';

/*************************************************************
Objetivo: Classe responsável por representar todas as operações com o tipo do cliente do negócio.


Atributos:
$descricao - descrição do tipo do cliente

Métodos:
insert - insere um tipo de cliente na tabela tipocliente
update - atualiza um tipo de cliente na tabela tipocliente

setDescricao - Atribui uma descricao ao tipo do cliente
getDescricao - Retorna a descricao ao tipo do cliente
*************************************************************/

class TipoCliente extends CRUD {
	
	protected $table ='tipocliente';
	
	private $id;
	private $descricao;
	 
	
	/********Início dos métodos sets e gets*********/
	public function setid($id){
		$this->id = $id;
	}
	public function getid(){
		return $this->id;
	}
	public function setdescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getdescricao(){
		return $this->descricao;
	}
	/********Fim dos métodos sets e gets*********/
	
	
	/***************
	Objetivo: Método que insere um tipo de cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
		$sql="INSERT INTO $this->table (descricao) VALUES (:descricao)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':descricao', $this->descricao);		
		return $stmt->execute();
		
	}
	
	/***************
	Objetivo: Atuliza um tipo de cliente pelo id
	Parâmetro de entrada: $id - id do tipo do cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function update($id){
		$sql="UPDATE $this->table SET descricao = :nome WHERE id = :id ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':descricao', $this->descricao);		
		return $stmt->execute();
	}
	
}

?>