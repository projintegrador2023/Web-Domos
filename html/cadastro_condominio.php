<?php 
    require_once('db/DB_Condominio.php');
    require_once('db/DB_Endereco.php');
    $condominio = new Condominio();
    $endereco = new Endereco();
    $codigo_endereco = null;

    $codigo_condominio = rand(100000, 999999);
    $sql = "SELECT * FROM CONDOMINIO WHERE codigo_condominio = '$codigo_condominio'";
    $stmt = Database::prepare($sql);
    $stmt->execute();
    while ($stmt->rowCount() > 0){
        $codigo_condominio = rand(100000, 999999);
        $stmt->execute();
    }
    $condominio->setCodigo_condominio($codigo_condominio);

    if (isset($_POST['submit'])){
        $email = filter_var($_POST['email_condominio'], FILTER_SANITIZE_EMAIL);
        if (validar_cnpj($_POST['cnpj_condominio']) /*&& validacao_nome($_POST['nome_condominio'])*/ && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $condominio->setCNPJ(preg_replace('/[^0-9]/', '', $_POST['cnpj_condominio']));
            $condominio->setNome($_POST['nome_condominio']);
            $condominio->setEmail($email);
            if ($_POST['senha_condominio'] == $_POST['conf_senha_condominio']){
                $condominio->setSenha($_POST['senha_condominio']);
                $numero = filter_var($_POST['numero'], FILTER_SANITIZE_NUMBER_INT);
                if (validacao_cep(preg_replace('/[^0-9]/', '', $_POST['cep_condominio'])) /*&& validacao_nome($_POST['cidade_condominio']) && validacao_nome($_POST['bairro_condominio']) && validacao_nome($_POST['rua_condominio'])*/ && filter_var($numero, FILTER_VALIDATE_INT) && $_POST['estado_condominio'] != 'Escolha uma opção'){
                    $endereco->set_cep(preg_replace('/[^0-9]/', '', $_POST['cep_condominio']));
                    $endereco->set_estado($_POST['estado_condominio']);
                    $endereco->set_cidade($_POST['cidade_condominio']);
                    $endereco->set_bairro($_POST['bairro_condominio']);
                    $endereco->set_rua($_POST['rua_condominio']);
                    $endereco->set_numero($numero);
                    if ("" == trim($_POST['complemento']) /*|| validacao_nome($_POST['complemento'])*/){
                        $endereco->set_complemento($_POST['complemento']);
                        $codigo_endereco = $endereco->insert();
                        $condominio->setEndereco($codigo_endereco);
                        $divisoes = $_POST['divisao'];
                        $numeros = $_POST['num'];
                        if ($_POST['faixa_qtd_moradores'] != 'Escolha uma opção' && $_POST['tipo_moradia'] != 'Escolha uma opção' && !validacao_vazio($divisoes) && !validacao_vazio($numeros)){
                            $condominio->set_divisoes($divisoes);
                            $condominio->set_numeros($numeros);

                            $sql = "SELECT codigo_faixa FROM FAIXA_QTD_MORADORES WHERE faixa_qtd = :faixa";
                            $stmt = Database::prepare($sql);
                            $stmt->bindParam(":faixa", $_POST['faixa_qtd_moradores']);
                            $stmt->execute();
                            $faixa_qtd = $stmt->fetch(PDO::FETCH_BOTH);
                            $condominio->setFaixa_qtd_moradores($faixa_qtd[0]);

                            $sql = "SELECT codigo_tipo_moradia  FROM TIPO_MORADIA  WHERE nome  = :nome ";
                            $stmt = Database::prepare($sql);
                            $stmt->bindParam(":nome", $_POST['tipo_moradia']);
                            $stmt->execute();
                            $tipo_moradia = $stmt->fetch(PDO::FETCH_BOTH);
                            $condominio->setTipo_moradia($tipo_moradia[0]);
                            $condominio->setRegimento(null);

                            $condominio->insert();
                            header('Location: index.php');
                        } else{
                            echo "  <script> 
                                    alert('Verifique as informações do condomínio.');
                                </script>";
                        }
                    } else{
                        echo "  <script> 
                                    alert('Complemento inválido.');
                                </script>";
                    }
                }
            }
            else {
                echo "<script> 
                alert('As senhas não coincidem.');
                </script>";
            }
        } else {
            echo "<script> 
                alert('CNPJ, nome ou email inválidos.');
                </script>";
        }
    }

    function validacao_vazio($array){
        for ($i = 0; $i < count($array); $i++){
            if ($array[$i] == ''){
                return true;
            }
        }
        return false;
    }
   
    function validacao_nome($nome){
		if (!preg_match("/^[a-zA-ZÀ-ú-' ]*$/", $nome)){
			echo "<script> 
			alert('O nome contém caracteres inválidos');
			</script>";
			return false;
		} 
		return true;
	}
    function validacao_cep($cep){
        if(!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep)) {
            echo "<script> 
            alert('Cep inválido');
            </script>";
            return false;
        } else return true;
    }
    function validar_cnpj($cnpj){
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
    
        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;	
    
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
    
        $resto = $soma % 11;
    
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;
    
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
    
        $resto = $soma % 11;
    
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="css/img/logo.png"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="js/script.js" defer></script>
    <script src="js/formulario.js" defer></script>
    <title> Cadastro do condomínio - Domos </title>
    <title>Document</title>
</head>
<body>
    <div class="fundo-imagem pb-5">
    <?php include('header.php'); ?>
    
        <div class="col-12">
            <form class="" action="" method="POST">
            <div class="">
                <div class="formulario m-auto col-9 col-md-7 col-lg-5 col-xl-5 px-5 py-4 mt-4 d-block" id="div_cadastro_condominio">

                    <h2 class="color-0491a3 fw-400 text-center mt-3 mb-4">Cadastro do Condomínio</h2>

                    <label for="cnpj_condominio" class="text-start color-0491a3 fw-400 fs-5" >CNPJ*</label>
                    <input type="text" required id="cnpj_condominio" name="cnpj_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black">

                    <label for="nome_condominio" class="text-start color-0491a3 fw-400 fs-5">Nome*</label>
                    <input type="text" required id="nome_condominio" name="nome_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black">

                    <label for="email_condominio" class="text-start color-0491a3 fw-400 fs-5">E-mail*</label>
                    <input type="email" required id="email_condominio" name="email_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black">

                    <label for="senha_condominio" class="text-start color-0491a3 fw-400 fs-5">Senha*</label>
                    <input type="password" required id="senha_condominio" name="senha_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black">

                    <label for="senha_condominio" class="text-start color-0491a3 fw-400 fs-5">Confirmar senha*</label>
                    <input type="password" required id="conf_senha_condominio" name="conf_senha_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black">

                    </div>

                    <div class="formulario m-auto col-9 col-md-7 col-lg-5 col-xl-5 px-5 py-4 mt-4" id="div_cadastro_endereco">
                    <h2 class="color-0491a3 fw-400 text-center mt-3 mb-4"> Cadastro do Endereço</h2>

                    <label for="cep_condominio" class="text-start color-0491a3 fw-400 fs-5 d-block mt-3">CEP*</label>
                    <input type="text" id="cep_condominio" name="cep_condominio" class="col-4 input-form bg-e8e8e8 fs-6 p-2 mb-3 text-black d-block">
                    <div class="d-flex col-12 justify-content-between mb-3">
                        <label class="text-start color-0491a3 fw-400 fs-5 d-block col-5">Cidade*
                            <input type="text" id="cidade_condominio" name="cidade_condominio" class="col-12 input-form bg-e8e8e8 fs-6 p-2 text-black d-block">
                        </label>
                        <label class="text-start color-0491a3 fw-400 fs-5 d-block col-5">Estado*
                            <!--input type="text" id="estado_condominio" name="estado_condominio" class="col-12 input-form bg-e8e8e8 fs-6 p-2 text-black d-block"-->
                            <select id="estado_condominio" name="estado_condominio" class="col-12 form-select d-block fs-6 p-2 color-0491a3">
                                <option class="text-black">Escolha uma opção</option>
                                <?php 
                                    require_once('db/30_DB_database.php');
                                    $sql = "SELECT uf FROM ESTADO";
		                            $stmt = Database::prepare($sql);
		                            $stmt->execute();
		                            $estados = $stmt->fetchAll(PDO::FETCH_BOTH);
                                    for ($i = 0; $i < $stmt->rowCount(); $i++){
                                        echo "<option class='text-black'>"; 
                                        echo $estados[$i][0];
                                        echo "</option>";
                                    }
                                ?>
                            </select>
                        </label>
                    </div>
                    <label for="nome_condominio" class="text-start color-0491a3 fw-400 fs-5">Bairro*</label>
                    <input type="text" id="bairro_condominio" name="bairro_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black">
                    <label for="nome_condominio" class="text-start color-0491a3 fw-400 fs-5">Rua*</label>
                    <input type="text" id="rua_condominio" name="rua_condominio" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black">

                    <div class="d-flex col-12 justify-content-between mb-3">
                        <label class="color-0491a3 fs-6 fw-400 col-3">Número*
                            <input type="text" id="numero" name="numero" class="col-8 fs-6 p-2 text-black input-form bg-e8e8e8 d-block">
                        </label>
                        <label class="color-0491a3 fs-6 fw-400 col-8">Complemento
                            <input type="text" id="complemento" name="complemento" class="col-12 fs-6 p-2 text-black input-form bg-e8e8e8 d-block">
                        </label>
                    </div>
                </div>
            </div>
                
            <div> </div>

                <div class="formulario m-auto col-9 col-md-7 col-lg-5 col-xl-5 px-5 py-4 mt-4" id="div_cadastro_informacoes">
                    <h2 class="color-0491a3 fw-400 text-center mt-3 mb-4">Informações do condomínio</h2>

                    <h4 class="color-0491a3 fs-6 fw-400 col-12 d-block">Faixa de Moradores*</h4>
                        <select for="faixa_qtd_moradores" id="faixa_qtd_moradores" name="faixa_qtd_moradores" class="form-select d-block fs-6 p-2 color-0491a3 col-12 mb-5">
                        <option class="text-black">Escolha uma opção</option>
                        <?php 
                                    require_once('db/30_DB_database.php');
                                    $sql = "SELECT faixa_qtd FROM FAIXA_QTD_MORADORES";
		                            $stmt = Database::prepare($sql);
		                            $stmt->execute();
		                            $faixa_qtd = $stmt->fetchAll(PDO::FETCH_BOTH);
                                    for ($i = 0; $i < $stmt->rowCount(); $i++){
                                        echo "<option class='text-black'>"; 
                                        echo $faixa_qtd[$i][0];
                                        echo "</option>";
                                    }
                                ?>
                        </select>
                    
                    <h4 class="color-0491a3 fs-6 fw-400 col-12 d-block">Tipo de moradia*</h4>
                            <select for="tipo_moradia" id="tipo_moradia" name="tipo_moradia" class="form-select d-block fs-6 p-2 color-0491a3 col-12 mb-5">
                                <option value="default" class="text-black">Escolha uma opção</option>
                                <?php 
                                    require_once('db/30_DB_database.php');
                                    $sql = "SELECT nome FROM TIPO_MORADIA";
		                            $stmt = Database::prepare($sql);
		                            $stmt->execute();
		                            $nome = $stmt->fetchAll(PDO::FETCH_BOTH);
                                    for ($i = 0; $i < $stmt->rowCount(); $i++){
                                        echo "<option class='text-black'>"; 
                                        echo $nome[$i][0];
                                        echo "</option>";
                                    }
                                ?>
                            </select>

                    
                    <div class="mb-5">
                        <label for="nome_divisao" class="form-label color-0491a3 fs-6">Digite os números / nomes dos blocos:</label>

                        <div id="divisaodiv">
                            <input type="text" name="divisao[]" id="divisao" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black"><br>
                        </div>
                        
                        <input type="button" onclick=adicionarDivisao() value="Adicionar mais um bloco" class="justify-content-center bg-005661 color-fff p-2 rounded border-0 col-12 col-md-9 col-xxl-6 hover-0491a3"></input>
                        
                        <script>
                            function adicionarDivisao(){
                                
                                let a = document.createElement("div");
                                let b = '<input type="text" name="divisao[]" id="divisao" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black"><br>'

                                a.innerHTML = b;
                                document.getElementById("divisaodiv").appendChild(a);

                            }
                        </script>
                    </div>
                    <div class="mb-5">
                        <label for="numero_casa" class="form-label color-0491a3 fs-6">Digite os números das casas / apartamentos:</label>
                        <div id="numdiv">
                            <input type="text" name="num[]" id="num" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black"><br>
                        </div>
                        
                        <input type="button" onclick=adicionarNum() value="Adicionar mais um número" class="bg-005661 color-fff p-2 rounded border-0 col-12 col-md-9 col-xxl-6 hover-0491a3"></input>
                        
                        <script>
                            function adicionarNum(){
                                
                                let a = document.createElement("div");
                                let b = '<input type="text" name="num[]" id="num" class="col-12 p-2 mb-3 input-form bg-e8e8e8 fs-6 text-black"><br>'

                                a.innerHTML = b;
                                document.getElementById("numdiv").appendChild(a);

                            }
                        </script>
                    </div>
                    <div class="mb-5">
                      <label for="" class="form-label color-0491a3 fs-6">Insira o pdf de regimento interno (opcional):</label>
                      <input name="regimento_interno" accept="application/pdf" type="file" class="form-control" id="regimento_interno">
                    </div>
                    <div class="text-end col-12">
                        <input type="submit" name="submit" value="Cadastrar" class="bg-005661 color-fff p-2 rounded border-0 col-12 col-md-6 col-xxl-3 hover-0491a3"></input>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <?php 
        include('footer.php');
    ?>

</body>
</html>
