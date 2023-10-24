<?php

require_once '30_DB_crud.php';
require_once '30_DB_Pessoa.php';
require_once '30_DB_Funcionario.php';

/*************************************************************
Objetivo: Classe responsável por representar todas as operações com o cliente do negócio.


Atributos:
$nome- nome do cliente
$sobrenome - sobrenome do cliente
$email - email do cliente
$idade - idade do cliente

Métodos:
insert - insere um cliente na tabela cliente
update - atualiza um cliente na tabela cliente

setNome - Atribui um nome ao cliente
getNome - Retorna o nome do cliente
setSobrenome - Atribui um sobrenome ao cliente
getSobrenome - Retorna o sobrenome ao cliente
setEmail - Atribui um email ao cliente
getEmail - Retorna o email do cliente
setIdade - Atribui uma idade ao cliente
getIdade - Retorn a idade do cliente
*************************************************************/

class Cliente extends CRUD{
	use Pessoa , Funcionario; 
	
	
	protected $table ='clientes';
	
	
	private $nome;
	private $sobrenome;
	private $email;
	private $idade;
	private $tipocliente; 
	
	/********Início dos métodos sets e gets*********/
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}
	public function getSobrenome(){
		return $this->sobrenome;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getEmail(){
		return $this->email;
	}
	public function setIdade($idade){
		$this->idade = $idade;
	}
	
	public function getIdade(){
		return $this->idade;
	}
	
	
	public function setTipoCliente($tipocliente){
		$this->tipocliente = $tipocliente;
	}
	
	public function getTipoCliente(){
		return $this->tipocliente;
	}
	/********Fim dos métodos sets e gets*********/
	
	
	/***************
	Objetivo: Método que insere um cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
		$sql="INSERT INTO $this->table (nome,sobrenome,email,idade,tipocliente) VALUES (:nome,:sobrenome,:email,:idade,:tipocliente)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':sobrenome', $this->sobrenome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':idade', $this->idade, PDO::PARAM_INT);
		$stmt->bindParam(':tipocliente', $this->tipocliente, PDO::PARAM_INT);
		
		return $stmt->execute();
		
	}
	
	/***************
	Objetivo: Atuliza um cliente pelo id
	Parâmetro de entrada: $id - id do cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function update($id){
		$sql="UPDATE $this->table SET nome = :nome, sobrenome = :sobrenome, email = :email , idade = :idade  WHERE id = :id ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':sobrenome', $this->sobrenome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':idade', $this->idade, PDO::PARAM_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		// $stmt->bindParam(':tipocliente', 1, PDO::PARAM_INT);
		return $stmt->execute();
	}
	
	
	
	
		
	
}

?>