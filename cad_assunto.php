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
	$usuario_id =$_SESSION['idusario'];
	$usuario_nome = $_SESSION['nome'];





if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$nome = $_POST["nome"];
	$qryInsert = sprintf("insert into assuntos ( descricao ) values ('%s')",$nome);

		$result = mysqli_query($conexao,$qryInsert);
		header("Location: principal.php");
}
?>
<div class="container-fluid">
	<form action="cad_assunto.php" method="post">
	<hr />
		<div class="flex-row-reverse">
			<h5>Cadastro Assunto</h5>
		</div>
		<div class="row">
			<div class="form-group col-md-5">
				<label for="name">Nome</label>
				<input type="text" class="form-control" name="nome" required="required">
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