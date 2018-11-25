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
	<div class="row">
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="customers/add.php" class="btn btn-primary">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-plus fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Novo Cliente</p>
				</div>
			</div>
		</a>
	</div>

</div>

 
<?php require_once 'footer.html';  ?>