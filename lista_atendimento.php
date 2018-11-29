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

	$id = $_POST["idpessoa"];


	$sql = 'SELECT descricao, tipo_atendimento, p.nome as pessoa ,data, u.nome as usuario  from atendimento
			inner join pessoas p on ( pessoas_idpessoas = p.idpessoas )
			inner join tipo_atendimento a on ( idtipo_atendimento_tipo_atendimento = idtipo_atendimento )
			inner join usuarios u on ( usuarios_idusuarios = u.idusuarios )';
	$result = mysqli_query($conexao, $sql);



?>

<div class="container-fluid">
	 <header>
	 	<hr>
		<div class="row">
			<div class="align-self-lg-auto col-sm-6">
	     			<div class="input-group-prepend">
	       			<input id="myInput" onkeyup="myFunction()" placeholder="Consultar" type="text" class="form-control">
	     			</div>
			</div>

				<div class="col-sm-6 text-right">
			    	<a class="btn btn-primary" href="cad_processos.php"><i class="fa fa-plus"></i> Novo Processo</a>
			    	<a class="btn btn-default" href="processos.php"><i class="fa fa-refresh"></i> Atualizar</a>
			    </div>
			</div>
		</header>
<hr>
	
	<body>
		<table id="myTable" class="table table-hover">
			<thead>
				<tr>
				<th>Nro. Processo</th>
				<th width="30%">Assistido</th>
				<th>Data Abertura</th>
				<th>Assunto</th>
				<th>Opções</th>
				</tr>
			</thead>
	<?php
		while ($processo = mysqli_fetch_array($result)) {
			$numeroprocesso = $processo['numero_processo'];
			$assistido = $processo['nome'];
			$assunto = $processo['descricao'];
			$dataabertura = date("d/m/Y",strtotime(str_replace('-','/',$processo['data_abertura'])));
			$id = $processo['idprocesso'];
			echo "
				<tr>
				<td>$numeroprocesso</td>
			 	<td >$assistido</td>
				<td>$dataabertura</td>
				<td>$assunto</td>	
				<td class='actions text-left'>
					<a href='processo_vizualizar.php?id=$id' class='btn btn-sm btn-success'><i class='fa fa-eye'></i>Visualizar</a>
					<a href='processo_editar.php' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i>Editar</a>
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