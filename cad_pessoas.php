<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php 
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.php');
	}
	 
	$usuario_login = $_SESSION['login'];
	$usuario_id =$_SESSION['idusario'];
	$usuario_nome = $_SESSION['nome'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$nome = $_POST["nome"];
	$cpf = $_POST["cpf"];
	$datanascimento = $_POST["datanascimento"];
	$datanascimento = date("Y-m-d",strtotime(str_replace('/','-',$datanascimento)));  
	$genitor1 = $_POST["genitor1"];
	$genitor2 = $_POST["genitor2"];
	$endereco = $_POST["endereco"];
	$bairro = $_POST["bairro"];
	$cep = $_POST["cep"];
	$genero = $_POST["genero"];
	$cidade = $_POST["cidade"];
	$uf = $_POST["estado"];
	$renda = $_POST["renda"];
	$renda = str_replace('.','',$renda); 
	$renda = str_replace(',','.',$renda);
	//  
	$celular = $_POST["celular"];
	$telefone = $_POST["telefone"];
	$rg = $_POST["rg"];

	$qryInsert = sprintf("
		insert into pessoas (
		nome, cpf, data_nascimento,
		genitor1, genitor2, endereco,
		bairro, cep, genero,
		cidade, uf, renda,
		celular, telefone, rg, data_atualizacao
		) values ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',%s,'%s','%s', '%s', Now() )",$nome, $cpf, $datanascimento, $genitor1, $genitor2, $endereco, $bairro, $cep, $genero, $cidade, $uf, $renda, $celular, $telefone, $rg);

		//echo "$qryInsert";

		$result = mysqli_query($conexao,$qryInsert);
		header("Location: principal.php");

			
}
?>


<div class="container-fluid">
    <ul class="nav nav-tabs">
   	<li class="active"><a data-toggle="tab" href="#menuDados">Dados Pessoais</a></li>
   	<li><a data-toggle="tab" href="#menuDocumento">Documentos</a></li>
   </ul>

  <div class="tab-content">
    <div id="menuDados" class="tab-pane fade active in">
          <form action="cad_pessoas.php" method="post">
			  <!-- area de campos do form -->
			  <hr />
			  <div class="row">
				<div class="form-group col-md-5">
				  <label for="name">Nome</label>
				  <input type="text" class="form-control" name="nome" required="required">
				</div>

				<div class="form-group col-md-2">
				  <label for="campo2">CPF</label>
				  <input type="text" class="form-control" name="cpf" id="cpf" required="required">
				</div>

				<div class="form-group col-md-3">
				  <label for="campo2">RG</label>
				  <input type="text" class="form-control" name="rg" id="rg" required="required">
				</div>

				
			</div>

			<div class="row">
				<div class="form-group col-md-5">
				  <label for="name">Genitor 1</label>
				  <input type="text" class="form-control" name="genitor1" required="required">
				</div>

				<div class="form-group col-md-5">
				  <label for="name">Genitor 2</label>
				  <input type="text" class="form-control" name="genitor2" required="required">
				</div>
			</div>

				<div class="row">
					<div class="form-group col-md-5">
						<label for="campo1">Endereço</label>
						<input type="text" class="form-control" name="endereco" required="required">
					</div>

					<div class="form-group col-md-3">
						<label for="campo2">Bairro</label>
						<input type="text" class="form-control" name="bairro" required="required">
					</div>

					<div class="form-group col-md-2">
						<label for="campo3">CEP</label>
						<input type="text" class="form-control" name="cep" id="cep" required="required">
					</div>
			  </div>

			  <div class="row">

				<div class="form-group col-md-2">
				<label for="data-pagamento">Data de Nascimento</label>
                <div class="input-group date" data-date-format="dd/mm/yyyy" required="required">
                	<input  type="text" class="form-control" name="datanascimento">
                	<div class="input-group-addon" >
                    	<span class="glyphicon glyphicon-th"></span>
                	</div>
                </div>
				</div>

				<div class="form-group col-md-2">
					<label for="campo3">Gênero</label>
					<select class="form-control" id="genero" required="required" name="genero"> 
					    <option>Masculino</option>
					    <option>Feminino</option>
					</select>
				</div>

				<div class="form-group col-md-2">
				  <label for="campo3">Data de Cadastro</label>
				  <input type="text" class="form-control" name="dateCadastro" disabled>
				</div>

				<div class="form-group col-md-3">
				  <label for="campo1">Cidade</label>
				  <input type="text" class="form-control" name="cidade" required="required">
				</div>

				<div class="form-group col-md-1">
				  <label for="campo2">UF</label>
				  <input type="text" class="form-control" name="estado" id="estado" required="required">
				</div>

			  </div>

				<div class="row">				
					<div class="form-group col-md-2">
					  <label for="campo1">Telefone</label>
					  <input type="text" class="form-control" name="telefone" id="telefone">
					</div>

					<div class="form-group col-md-2">
					  <label for="campo2">Celular</label>
					  <input type="text" class="form-control" name="celular" id="celular">
					</div>

					<div class="form-group col-md-2">
					  <label for="campo3">Renda</label>
					  <input type="text" class="form-control" name="renda" id="renda">
					</div>
				</div>
			</form>
	  		</div>

	<div id="menuDocumento" class="tab-pane fade">
		<form name="upload" enctype="multipart/form-data" method="post" action="upload.php">
			<input type="hidden" name="MAX_FILE_SIZE" value="10485760">
		    <input type="file" name="arquivo[]" multiple="multiple" />
		    <input name="enviar" type="submit" value="Enviar">
		</form>
	  </div>
	  <div id="actions" class="row">
				<div class="col-md-12">
				  <button type="submit" class="btn btn-primary">Salvar</button>
				  <a href="principal.php" class="btn btn-default">Cancelar</a>
				</div>
			  </div>
    </div>
</div>

 
<?php require_once 'footer.html';  ?>

 	<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
    <script>
	    $('.input-group.date').datepicker({format: "dd/mm/yyyy"});
    </script>

    <script type="text/javascript" src="js/jquery.mask.min.js"></script>	
		<script type="text/javascript">
		$(document).ready(function(){
			$("#cpf").mask("000.000.000-00")
			$("#telefone").mask("(00) 00000-0000")
			$("#celular").mask("(00) 00000-0000")
			$("#renda").mask("999.999.990,00", {reverse: true})
			$("#cep").mask("00.000-000")
			$("#dataNascimento").mask("00/00/0000")
			
			/*$("#rg").mask("999.999.999-W", {
				translation: {
					'W': {
						pattern: /[X0-9]/
					}
				},
				reverse: true
			})
			
			var options = {
				translation: {
					'A': {pattern: /[A-Z]/},
					'a': {pattern: /[a-zA-Z]/},
					'S': {pattern: /[a-zA-Z0-9]/},
					'L': {pattern: /[a-z]/},
				}
			}*/
			
			$("#codigo").mask("AA.LLL.0000", options)
			
			$("#celular").mask("(00) 0000-00009")
			
			$("#celular").blur(function(event){
				if ($(this).val().length == 15){
					$("#celular").mask("(00) 00000-0009")
				}else{
					$("#celular").mask("(00) 0000-00009")
				}
			})
		})
		</script>




