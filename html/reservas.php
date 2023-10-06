<?php 
  include("iniciar_sessao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/calendario/reservas.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/calendario/calendario.css">
    <script src="js/calendario/jquery.min.js"></script>
    <script src="js/calendario/popper.js"></script>
    <script src="js/calendario/bootstrap.min.js"></script>
    <script src="js/calendario/main.js"></script>

    <script src="js/sidebar.js" defer></script> </script>

    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <title> Reservas - Domos </title>
</head>

<body>
    <!-- Container -->
    <div class="grid-container">
        <!--Cabeçalho de pesquisa e filtros-->
        <header class="header m-2">
            <div class="menu-icon" onclick="openSidebar()">
                <span class=""><i class="fa-solid fa-bars color-subtitulo"></i></span>
            </div>
            <div class="btn-group bg_group w-100 m-2">
                <a href="#" class="btn bg_group"> Churrasqueira </a>
                <a href="#" class="btn bg_group"> Espaço Gourmet </a>
                <a href="#" class="btn bg_group"> Espaço Kids </a>
                <a href="#" class="btn bg_group">Sala de Jogos </a>
                <a href="#" class="btn bg_group"> Salão de festas </a>
                <a href="#" class="btn bg_group"> Sauna </a>
                <a href="#" class="btn bg_group"> Quadra </a> 
                <!-- <a href="testes.php" class="btn bg_group"> Testes </a> (sera utilizado no proximo trabalho)-->
            </div>
        </header>

		<?php
		$_SELECTED = 3; 
		include("aside.php");
		?>

        <!-- Main principal (container)-->  
        <main class="main-container"> 
		<div class="container m-auto">
			<div class="row">
				<div class="col-md-12">
					<div class="content w-100">
				    <div class="calendar-container">
				      <div class="calendar"> 
				        <div class="year-header"> 
				          <span class="left-button fa fa-chevron-left" id="prev"> </span> 
				          <span class="year" id="label"></span> 
				          <span class="right-button fa fa-chevron-right" id="next"> </span>
				        </div> 
				        <table class="months-table w-100"> 
				          <tbody>
				            <tr class="months-row">
				              <td class="month">Jan</td> 
				              <td class="month">Fev</td> 
				              <td class="month">Mar</td> 
				              <td class="month">Abr</td> 
				              <td class="month">Mai</td> 
				              <td class="month">Jun</td> 
				              <td class="month">Jul</td>
				              <td class="month">Ago</td> 
				              <td class="month">Set</td> 
				              <td class="month">Out</td>          
				              <td class="month">Nov</td>
				              <td class="month">Dez</td>
				            </tr>
				          </tbody>
				        </table> 
				        
				        <table class="days-table w-100"> 
				          <td class="day">Dom</td> 
				          <td class="day">Seg</td> 
				          <td class="day">Ter</td> 
				          <td class="day">Qua</td> 
				          <td class="day">Qui</td> 
				          <td class="day">Sex</td> 
				          <td class="day">Sab</td>
				        </table> 
				        <div class="frame"> 
				          <table class="dates-table w-100"> 
			              <tbody class="tbody">             
			              </tbody> 
				          </table>
				        </div> 
				        <button class="button" id="add-button">Adicionar evento</button>
				      </div>
				    </div>
				    <div class="events-container">
				    </div>
				    <div class="dialog" id="dialog">
				        <h2 class="dialog-header"> Adicionar novo evento </h2>
				        <form class="form" id="form">
				          <div class="form-container" align="center">
				            <label class="form-label" id="valueFromMyButton" for="name">Nome do evento</label>
				            <input class="input" type="text" id="name" maxlength="36">
				            <label class="form-label" id="valueFromMyButton" for="count">Quantidade de convidados</label>
				            <input class="input" type="number" id="count" min="0" max="10000" maxlength="7">
				            <input type="button" value="Cancel" class="button" id="cancel-button">
				            <input type="button" value="Confirmar" class="button button-white" id="ok-button">
				          </div>
				        </form>
				      </div>
				  </div>
				</div>
			</div>
		</div>
        </main>
    </div>
   
</html>