<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>
<?php

	session_start();

	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.php');
	}

	$usuario_login = $_SESSION['login'];
	$usuario_id = $_SESSION['idusario'];
	$usuario_nome = $_SESSION['nome'];
	


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$prazo = $_POST["prazo"];
	$prazo = date("Y-m-d",strtotime(str_replace('/','-',$prazo)));
	$id_usuario = $usuario_id;
	$descricao = $_POST["descricao"];
	$processo = $_POST["idprocesso"];

	$tipo_movimentacao = $_POST["idtipo_movimentacao"];

	$qryInsert = sprintf("insert into movimentacao
			(data_hora, prazo, descricao,
			processo_idprocesso, tipo_movimentacao_idtipo_movimentacao,
			usuarios_idusuarios)
			values ( Now(),'%s','%s','%s','%s','%s')", $prazo, $descricao, $processo, $tipo_movimentacao , $id_usuario);

			

			//echo "<pre>";
			//print_r($_POST);
			//echo "</pre>";
			//echo "$usuario_id";
			//echo "$qryInsert";

		$result = mysqli_query($conexao,$qryInsert);
		header("Location: processos.php");
	}
?>


<div class="container-fluid">
          <form action="cad_movimentacao.php" method="post">
			  <!-- area de campos do form -->
			  <hr />
			<div class="row">
				<div class="form-group col-md-3">
					<label for="numeroprocesso">Descricao</label>
					<textarea name="descricao" id="descricao" class = "form-control"required ="required" linhas = "5"> </textarea> 
				</div>


				<div class="form-group col-md-2">
				<label for="dataabertura">Prazo: </label>
                <div class="input-group date" data-date-format="dd/mm/yyyy" required="required">
                	<input  type="text" class="form-control" name="prazo">
                	<div class="input-group-addon" >
                    	<span class="glyphicon glyphicon-th"></span>
                	</div>
                </div>
				</div>
			</div>
				<div class="row">
					<div class="col-sm-5">
						<label for="id_pessoa">Numero Processo:</label><br>
						<select name="idprocesso" id="idprocesso" class="selectpicker" required="required" data-live-search="true">
						<option value="">--Selecione--</option>
						<?php
							$sql = "select idprocesso, numero_processo from processo order by numero_processo";
							$res = mysqli_query($conexao, $sql);
							while ($temp = mysqli_fetch_array($res)) {
								$idprocesso = $temp['idprocesso'];
								$nome = $temp['numero_processo'];
								echo "<option value='$idprocesso'>$nome</option>";
								}?>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-2">
						<label for="id_assunto">Tipo de Movimentaão:</label><br>
						<select name="idtipo_movimentacao" id="idtipo_movimentacao" class="selectpicker" required="required" data-live-search="true" required="required">
						<option value="">--Selecione--</option>
						<?php
							$sql = "select idtipo_movimentacao, tipo from tipo_movimentacao order by tipo";
							$res = mysqli_query($conexao, $sql);
							while ($temp = mysqli_fetch_array($res)) {
								$idtipo = $temp['idtipo_movimentacao'];
								$desc = $temp['tipo'];
								echo "<option value='$idtipo'>$desc</option>";
								}?>
						</select>
					</div>
				</div>
				<br>
				<div id="actions" class="row">
					<div class="col-md-12">
				  		<button type="submit" class="btn btn-primary">Salvar</button>
				 		<a href="index.php" class="btn btn-default">Cancelar</a>
				</div>
			  </div>
			</form>
    </div>
</div>


<?php require_once 'footer.html';  ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/i18n/defaults-pt_BR.min.js"></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
    <script>
	    $('.input-group.date').datepicker({format: "dd/mm/yyyy"});
    </script>