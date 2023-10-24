<?php


//Header
include_once '30_DB_header.php';

//Classe de cliente
include_once '30_DB_Cliente.php';


//Verifica se o id do cliente foi passado na URL da requisição HTTP
if(isset($_GET['id'])):
	//filter_var retorna false se o parâmetro não for inteiro, e caso contrário retorna um inteiro.
	$id=filter_var($_GET['id'], FILTER_VALIDATE_INT);
	
	//Se o id for inteiro, então será consultado o cliente pelo id
	if ($id):
	
		//instancia o cliente
		$cliente = new Cliente();	
		//consulta o cliente pelo id
		$linhadaTabela= $cliente->find($id);
		
	else:
		echo "parâmetro inválido.";
	endif;
endif;
 
 ?>

<div class="row">
	<div class="col s12 m6 push-m3 ">
	<h3 class="light"> Editar Cliente </h3>
	<form action="30_DB_update.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $linhadaTabela['id']; ?>">
		<div class="input-field col s12">
			<input type="text" name="nome" id="nome" value="<?php echo $linhadaTabela['nome']; ?>">
			<label for="nome"> Nome</label>
		</div>
	
		<div class="input-field col s12">
			<input type="text" name="sobrenome" id="sobrenome" value="<?php echo $linhadaTabela['sobrenome']; ?>">
			<label for="sobrenome"> Sobrenome</label>
		</div>
		
		<div class="input-field col s12">
			<input type="text" name="email" id="email" value="<?php echo $linhadaTabela['email']; ?>" >
			<label for="email"> Email</label>
		</div>
			
		<div class="input-field col s12">
			<input type="number" name="idade" id="idade" min="10" max="120" value="<?php echo $linhadaTabela['idade']; ?>">
			<label for="idade"> Idade</label>
		</div>
		<button type="submit" name="btn-editar" class="btn">Atualizar</button>
		<a href="30_DB_index.php" type="submit" class="btn green">Lista de clientes</button>
	</form>
	
	</div>
</div>




<?php include_once '30_DB_footer.php';?>

     
 
