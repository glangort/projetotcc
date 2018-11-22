<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$numeroprocesso = $_POST["numeroprocesso"];
	$cnj = $_POST["cnj"];
	$dataabertura = $_POST["dataabertura"];
	$dataabertura = date("Y-m-d",strtotime(str_replace('/','-',$dataabertura)));
	$id_assuntos = $_POST["id_assuntos"];
	$id_pessoa = $_POST["id_pessoa"];
	$id_usuario = $_POST["id_usuario"];
	$id_situacao = $_POST["id_situacao"];
	$qryInsert = sprintf("
		insert into processos (
		numeroprocesso, cnj, dataabertura,
		id_assunto, id_pessoa, id_usuario,
		id_situacao	) values ('%s','%s','%s','%s','%s','%s','%s')",$numeroprocesso, $cnj, $dataabertura, $id_assuntos, $id_pessoa, $id_usuario, $id_situacao);

		$result = mysqli_query($conexao,$qryInsert);
		header("Location: principal.php");
	}
?>


<div class="container-fluid">
    <ul class="nav nav-tabs">
   	<li class="active"><a data-toggle="tab" href="#menuDados">Dados do Processo</a></li>
   	<li><a data-toggle="tab" href="#menuDocumento">Documentos</a></li>
   </ul>

  <div class="tab-content">
    <div id="menuDados" class="tab-pane fade active in">
          <form action="cadastro.php" method="post">
			  <!-- area de campos do form -->
			  <hr />
			<div class="row">
				<div class="form-group col-md-5">
					<label for="name">Numero do Processo</label>
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

								echo "$desc";
								}?>
						</select>
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
			  <div id="actions" class="row">
				<div class="col-md-12">
				  <button type="submit" class="btn btn-primary">Salvar</button>
				  <a href="index.php" class="btn btn-default">Cancelar</a>
				</div>
			  </div>
			</form>
	  		</div>

	  <div id="menuDocumento" class="tab-pane fade">
		  <div class="form-group"> <br>
			<input type="file" id="exampleInputFile">
			<p class="help-block">Adicione aqui o Documento Desejado.</p>
  		</div>
		  
	  </div>
    </div>
</div>


<?php require_once 'footer.html';  ?>