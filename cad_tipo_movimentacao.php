<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>
	
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$nome = $_POST["nome"];
	$qryInsert = sprintf("insert into tipo_movimentacao ( tipo ) values ('%s')",$nome);

		$result = mysqli_query($conexao,$qryInsert);
		header("Location: cad_pessoas.php");
}
?>
<div class="container-fluid">
	<form action="cadastro.php" method="post">
	<hr />
		<div class="flex-row-reverse">
			<h5>Cadastro Tipo de Movimentação</h5>
		</div>
		<div class="row">
			<div class="form-group col-md-5">
				<label for="name">Nome</label>
				<input type="text" class="form-control" name="nome" required="required">
				<br>
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="cad_pessoas.php" class="btn btn-outline-secondary">Cancelar</a>
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