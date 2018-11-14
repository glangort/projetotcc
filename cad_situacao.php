<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>
	
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$descricao = $_POST["descricao"];
	$qryInsert = sprintf("insert into situacao ( descricao ) values ('%s')",$descricao);

		$result = mysqli_query($conexao,$qryInsert);
		header("Location: cad_pessoas.php");
}
?>
<div class="container-fluid">
	<form action="cad_situacao.php" method="post">
	<hr />
		<div class="flex-row-reverse">
			<h5>Cadastro de Situações</h5>
		</div>
		<div class="row">
			<div class="form-group col-md-5">
				<label for="name">Descrição</label>
				<input type="text" class="form-control" name="descricao" required="required">
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