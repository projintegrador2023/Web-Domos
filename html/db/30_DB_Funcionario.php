<?php

//poderia ter usado interface, no entanto não é possível criar atributo, apenas MÉTODOS
trait Funcionario {
	
	private $matricula;
		
		
	/********Início dos métodos sets e gets*********/
	public function setmatricula($matricula){
		$this->matricula = $matricula;
	}
	public function getmatricula(){
		return $this->matricula;
	}

	/********Fim dos métodos sets e gets*********/
	
}

?>