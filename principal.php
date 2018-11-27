<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>
<?php
	$sql = 'SELECT idpessoas, nome, cpf, telefone from pessoas';
	$result = mysqli_query($conexao, $sql);
	
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

?>
<div class="container-fluid">
	 <header>
		<div class="row">
			<div class="align-self-lg-auto col-sm-6">
	     			<div class="input-group-prepend">
	       			<input id="myInput" onkeyup="myFunction()" placeholder="Consultar" type="text" class="form-control">
	     			</div>
			</div>
				<div class="col-sm-6 text-right">
			    	<a class="btn btn-primary" href="cad_pessoas.php"><i class="fa fa-plus"></i> Novo Cliente</a>
			    	<a class="btn btn-default" href="principal.php"><i class="fa fa-refresh"></i> Atualizar</a>
			    </div>
			</div>
		</header>

	<hr>
	<body>
		<table id="myTable" class="table table-hover">
			<thead>
				<tr>
				<th>ID</th>
				<th width="30%">Nome</th>
				<th>CPF</th>
				<th>Telefone</th>
				<th>Atualizado em</th>
				<th>Opções</th>
				</tr>
			</thead>
	<?php
		while ($pessoa = mysqli_fetch_array($result)) {
			$id = $pessoa['idpessoas'];
			$nome = $pessoa['nome'];
			$cpf = $pessoa['cpf'];
			$telefone = $pessoa['telefone'];
			echo "
				<tr>
				<td>$id</td>
			 	<td >$nome</td>
				<td>$cpf</td>	
				<td>$telefone</td>
				<td>25/10/2018</td>	
				<td class='actions text-left'>
					<a href='pessoas_vizualizar.php?id=$id' class='btn btn-sm btn-success'><i class='fa fa-eye'></i>Visualizar</a>
					<a href='edit.php' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i>Editar</a>
				</td>
			</tr>";
			}
	?>
	</table>
 	</html>
 	</body>
 </div>

<!-- SCRIPT PARA FAZER PESQUISA NA TABELA -->

 <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

<?php require_once 'footer.html'; ?>
