<?php
	require_once('header.php');
	require ('conexao.php');

	$id = $_GET['id'];
	$sql = "select * from processo where idprocesso =".$id;

	$result = mysqli_query($conexao,$sql) or die();
	$pessoa = mysqli_fetch_array($result);

	//echo "<pre>";
	//print_r($pessoa);
	//echo "</pre>";

	$sqlmovimentacao = "select data_hora, descricao, tipo from movimentacao
			   inner join tipo_movimentacao on ( idtipo_movimentacao = tipo_movimentacao_idtipo_movimentacao )
			   where processo_idprocesso =" .$id;

	$resultmovimentacao = mysqli_query($conexao,$sqlmovimentacao) or die();


	$datanascimento = date("d/m/Y",strtotime(str_replace('-','/',$pessoa['data_nascimento'])));
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container-fluid">
    <ul class="nav nav-tabs">
   	<li class="active"><a data-toggle="tab" href="#menuDados">Dados do Processo</a></li>
   	<li><a data-toggle="tab" href="#menuDocumento">Movimentações</a></li>
   	</ul>

  <div class="tab-content">
    <div id="menuDados" class="tab-pane fade active in">
	<div class="container-fluid">
		<dl class="dl-horizontal">
			<dt>Nome:</dt>
			<dd><?php echo $pessoa['']; ?></dd>

			<dt>CPF:</dt>
			<dd><?php echo $pessoa['cpf']; ?></dd>

			<dt>Data de Nascimento:</dt>
			<dd><?php echo $datanascimento; ?></dd>

			<dt>Gênero:</dt>
			<dd><?php echo $pessoa['genero'];?></dd>

			<dt>Renda:</dt>
			<dd><?php echo $pessoa['renda']; ?></dd>
		</dl>

		<dl class="dl-horizontal">
			<dt>Endereço:</dt>
			<dd><?php echo $pessoa['endereco']; ?></dd>

			<dt>Bairro:</dt>
			<dd><?php echo $pessoa['bairro']; ?></dd>

			<dt>CEP:</dt>
			<dd><?php echo $pessoa['cep']; ?></dd>

			<dt>Data de Cadastro:</dt>
			<dd><?php echo '25/10/2018'; ?></dd>
		</dl>

		<dl class="dl-horizontal">
			<dt>Cidade:</dt>
			<dd><?php echo $pessoa['cidade']; ?></dd>

			<dt>Telefone:</dt>
			<dd><?php echo $pessoa['telefone']; ?></dd>

			<dt>Celular:</dt>
			<dd><?php echo $pessoa['celular']; ?></dd>

			<dt>UF:</dt>
			<dd><?php echo $pessoa['uf']; ?></dd>

		</dl>
		</div>
	</div>

	<div id="menuDocumento" class="tab-pane fade">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<h4>Timeline do Processo</h4>
						<ul class="timeline">

					 	<?php  while ($movimentacao = mysqli_fetch_array($resultmovimentacao)) { 

					 	$idprocesso =  $movimentacao['tipo'];
					 	$descricao = $movimentacao['descricao'];
					 	$data = $movimentacao['data_hora'];

					 	echo "
						<li>
							<a href='#'> $idprocesso</a>
							<a href='#' class='float-right'>$data</a>
							<p>$descricao</p>
						</li>";
						}?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="actions" class="row">
		<div class="col-md-12">
		  <a href="edit.php?id=$id" class="btn btn-primary">Editar</a>
		  <a href="principal.php" class="btn btn-default">Voltar</a>
		  <a href='teste_rel_pessoa.php?id=$id' class="btn btn-default">Relatório</a>
		</div>
	</div>
</div>

<?php require_once 'footer.html'; ?>