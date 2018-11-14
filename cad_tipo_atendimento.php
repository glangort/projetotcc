<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>
	
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$atendimento = $_POST["atendimento"];
	$qryInsert = sprintf("insert into atendimento ( atendimento ) values ('%s')",$atendimento);

		$result = mysqli_query($conexao,$qryInsert);
		header("Location: principal.php");
}
?>
<div class="container-fluid">
	<form action="cadastro.php" method="post">
	<hr />
		<div class="flex-row-reverse">
			<h5>Cadastro de Tipos de Atendimento</h5>
		</div>
		<div class="row">
			<div class="form-group col-md-5">
				<label for="name">Tipo de Atendimento</label>
				<input type="text" class="form-control" name="atendimento" required="required">
				<br>
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="principal.php" class="btn btn-outline-secondary">Cancelar</a>
			</div>
		
			<div id="actions" class="row">
				<div class="col-md-12">
					<br>
				</div>
			</div>
		</div>
	</form>
</div>

 
<?php require_once 'footer.html';  ?>