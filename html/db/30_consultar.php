<?php 



//Classe de negócio
include_once '30_DB_Cliente.php';
include_once '30_DB_TipoCliente.php';

//Header
include_once '30_DB_header.php';


//Mensagem
include_once '30_DB_mensagem.php';


function PreencheTipoCliente($idtipocliente){
	$tipocliente = new TipoCliente();
	$tabela_tipocliente= $tipocliente->find($idtipocliente);
	
	//Se possuir registros na tabela de tipo de cliente, então preencha o objeto
	if (count($tabela_tipocliente)>0):
		$tipocliente->setid($tabela_tipocliente[0]);
		$tipocliente->setdescricao($tabela_tipocliente[1]);
	endif;
	
	
	return $tipocliente;
				
}
	
		
?>





<div class="row">
	<div class="col s12 m6 push-m3 ">
	<h3 class="light"> Clientes - Orientado a objeto </h3>
	<table class="striped">
		<thead>
			<tr>
				<th>Nome:</th>
				<th>Sobrenome:</th>
				<th>Email:</th>
				<th>Idade:</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
			
			
			//instancia classes negócio
			$cliente = new Cliente();
			
			
			//retorna a tabela com todos os clientes
			$tabela= $cliente->findAll();
			
			//Se possuir registros na tabela de clientes, então percorra a tabela e exiba os registros
			if (count($tabela)>0):
			
			//percorrendo cada linha ou registro da tabela de clientes
			foreach($tabela as $linha){
				
				/**TIPO DO CLIENTE***/						
				$cliente->setTipoCliente(PreencheTipoCliente($linha['tipocliente']));
				
			?>
			<tr>
				<td><?php echo $linha['nome'];?></td>
				<td><?php echo $linha['sobrenome'];?></td>
				<td><?php echo $linha['email'];?></td>
				<td><?php echo $linha['idade'];?></td>
				<td><a href="30_DB_editar.php?id=<?php echo $linha['id'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a> </td>
				
				<td><a href="#modal<?php echo $linha['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a> </td>
				
				
				
				<!-- Estrutura modal do botão deletar (Quando a pagina é renderizada, então o materialize oculta esse div ) -->
				  <div id="modal<?php echo $linha['id'];?>" class="modal">
					<div class="modal-content">
					  <h3>Atenção!</h3>
					  <p>Deseja excluir esse cliente?</p>
					</div>
					<div class="modal-footer">
					  
					  <form action="30_DB_delete.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $linha['id'];?>">
						<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
						<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
					  
					  </form>
					  
					</div>
				  </div>
				  
				  
				 
				  
			</tr>
			<?php 
			} //endforeach 
			else: ?>
				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>
				
				
				
			<?php
			endif;
			?>
			
			
		</tbody>
	</table>
	<br>
	<a href="30_DB_adicionarclientes.php" class="btn"> Adicionar cliente</a>
	</div>
</div>


<?php include_once '30_DB_footer.php';?>

     
 
