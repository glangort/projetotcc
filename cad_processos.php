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
	$numeroprocesso = $_POST["numeroprocesso"];
	$cnj = $_POST["cnj"];
	$dataabertura = $_POST["dataabertura"];
	$dataabertura = date("Y-m-d",strtotime(str_replace('/','-',$dataabertura)));
	$id_assuntos = $_POST["id_assunto"];
	$id_pessoa = $_POST["id_pessoa"];
	$id_usuario = $usuario_id;
	$id_situacao = $_POST["id_situacao"];
	$comarca = $_POST["comarca"];
	$qryInsert = sprintf("
		insert into processo (
		numero_processo, cnj, data_abertura, 
		assuntos_idassuntos, pessoas_idpessoas, 
		comarca, situacao_idsituacao, usuarios_idusuarios ) values ('%s','%s','%s','%s','%s','%s','%s','%s')",$numeroprocesso, $cnj, $dataabertura, $id_assuntos, $id_pessoa, $comarca ,$id_situacao, $id_usuario);

		//echo "<pre>";
	//	print_r($_POST);
	//	echo "</pre>";

	//echo "$qryInsert";

		$result = mysqli_query($conexao,$qryInsert);
		header("Location: processos.php");
	}
?>


<div class="container-fluid">
    <ul class="nav nav-tabs">
   	<li class="active"><a data-toggle="tab" href="#menuDados">Dados do Processo</a></li>
   	<li><a data-toggle="tab" href="#menuDocumento">Documentos</a></li>
   </ul>

  <div class="tab-content">
    <div id="menuDados" class="tab-pane fade active in">
          <form action="cad_processos.php" method="post">
			  <!-- area de campos do form -->
			  <hr />
			<div class="row">
				<div class="form-group col-md-3">
					<label for="numeroprocesso">Numero do Processo</label>
					<input type="text" class="form-control" name="numeroprocesso" required="required">
				</div>

				<div class="form-group col-md-2">
					<label for="campo2">CNJ</label>
					<input type="text" class="form-control" name="cnj" id="cnj" required="required">
				</div>

				<div class="form-group col-md-2">
				<label for="dataabertura">Data de Abertura</label>
                <div class="input-group date" data-date-format="dd/mm/yyyy" required="required">
                	<input  type="text" class="form-control" name="dataabertura">
                	<div class="input-group-addon" >
                    	<span class="glyphicon glyphicon-th"></span>
                	</div>
                </div>
				</div>
			</div>
				<div class="row">
					<div class="col-sm-5">
						<label for="id_pessoa">Pessoa</label>
						<select name="id_pessoa" id="id_pessoa" class="form-control" required="required">
						<option value="">--Selecione--</option>
						<?php
							$sql = "select idpessoas, nome from pessoas order by nome";
							$res = mysqli_query($conexao, $sql);
							while ($temp = mysqli_fetch_array($res)) {
								$idpessoas = $temp['idpessoas'];
								$nome = $temp['nome'];
								echo "<option value='$idpessoas'>$nome</option>";
								}?>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-2">
						<label for="id_assunto">Assunto</label>
						<select name="id_assunto" id="id_assunto" class="form-control" required="required">
						<option value="">--Selecione--</option>
						<?php
							$sql = "select idassuntos, descricao from assuntos order by descricao";
							$res = mysqli_query($conexao, $sql);
							while ($temp = mysqli_fetch_array($res)) {
								$idassuntos = $temp['idassuntos'];
								$desc = $temp['descricao'];
								echo "<option value='$idassuntos'>$desc</option>";
								}?>
						</select>
					</div>

					<div class="col-sm-2">
						<label for="id_situacao">Situação</label>
						<select name="id_situacao" id="id_situacao" class="form-control" required="required">
						<option value="">--Selecione--</option>
						<?php
							$sql = "select idsituacao, descricao from situacao order by descricao";
							$res = mysqli_query($conexao, $sql);
							while ($temp = mysqli_fetch_array($res)) {
								$idsituacao = $temp['idsituacao'];
								$desc = $temp['descricao'];
								echo "<option value='$idsituacao'>$desc</option>";
								}?>
						</select>
					</div>

					<div class="form-group col-md-2">
						<label for="campo2">Comarca</label>
						<input type="text" class="form-control" name="comarca" id="comarca" required="required">
					</div>
				</div>
				<div id="actions" class="row">
					<div class="col-md-12">
				  		<button type="submit" class="btn btn-primary">Salvar</button>
				 		<a href="index.php" class="btn btn-default">Cancelar</a>
				</div>
			  </div>
			</form>
	  		</div>

	  <div id="menuDocumento" class="tab-pane fade">
	  	<hr/>
		  <form name="upload" enctype="multipart/form-data" method="post" action="upload.php">
			<input type="hidden" name="MAX_FILE_SIZE" value="10485760">
		    <input type="file" name="arquivo[]" multiple="multiple" />
		</form>
		  
	  </div>
    </div>
</div>


<?php require_once 'footer.html';  ?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
    <script>
	    $('.input-group.date').datepicker({format: "dd/mm/yyyy"});
    </script>