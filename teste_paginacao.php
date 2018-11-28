<?php require_once 'header.php'; ?>
<?php require 'conexao.php'; ?>
<?php include 'modal.php' ?>
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


	// definir o numero de itens por pagina
	$itens_por_pagina = 10;

	// pegar a pagina atual
	$pagina = intval($_GET['pagina']);

	// puxar produtos do banco
	$sql = "SELECT idpessoas, nome, cpf, telefone,data_atualizacao from pessoas LIMIT $pagina, $itens_por_pagina ";
	$result = mysqli_query($conexao, $sql);

	// pega a quantidade total de objetos no banco de dados
	$num_total = $mysqli->query("select pro_nome, pro_preco from produto")->num_rows;

	// definir numero de páginas
	$num_paginas = ceil($num_total/$itens_por_pagina);

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
			$dataatualizacao = date("d/m/Y",strtotime(str_replace('-','/',$pessoa['data_atualizacao'])));

			echo "
				<tr>
				<td>$id</td>
			 	<td >$nome</td>
				<td>$cpf</td>	
				<td>$telefone</td>
				<td>$dataatualizacao</td>	
				<td class='actions text-left'>
					<a href='pessoas_vizualizar.php?id=$id' class='btn btn-sm btn-success'><i class='fa fa-eye'></i>Visualizar</a>
					<a href='pessoas_editar.php?id=$id' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i>Editar</a>
					<a href='#'' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' data-customer='$id'<i class='fa fa-trash'></i> Desativar </a>
				</td>
			</tr>";
			}
	?>
	</table>
		<nav>
				  <ul class="pagination">
				    <li>
				      <a href="principal.php?pagina=0" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <?php
				    for($i=0;$i<$num_paginas;$i++){
				    $estilo = "";
				    if($pagina == $i)
				    	$estilo = "class=\"active\"";
				    ?>
				    <li <?php echo $estilo; ?> ><a href="principal.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
					<?php } ?>
				    <li>
				      <a href="principal.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav
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

<script>
	/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */

$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('customer');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Cliente #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})
</script>

<?php require_once 'footer.html'; ?>
