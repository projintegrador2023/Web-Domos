<?php include_once '30_DB_header.php';?>

<div class="row">
	<!--FORMULÁRIO PARA ADICIONAR UM CLIENTE ORIENTADO A OBJETOS-->
	<div class="col s12 m6 push-m3 ">
	<h3 class="light"> Novo Cliente </h3>
	<form action="30_DB_create.php" method="POST">
		<div class="input-field col s12">
			<input type="text" name="nome" id="nome">
			<label for="nome"> Nome</label>
		</div>
	
		<div class="input-field col s12">
			<input type="text" name="sobrenome" id="sobrenome">
			<label for="sobrenome"> Sobrenome</label>
		</div>
		
		<div class="input-field col s12">
			<input type="text" name="email" id="email" >
			<label for="email"> Email</label>
		</div>
			
		<div class="input-field col s12">
			<input type="number" name="idade" id="idade" min="10" max="120">
			<label for="idade"> Idade</label>
		</div>
		<button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
		<a href="30_DB_index.php" type="submit" class="btn green">Lista de clientes</a>
	</form>
	
	</div>
</div>


<?php include_once '30_DB_footer.php';?>

     
 
