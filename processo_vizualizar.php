<?php
	require_once('header.php');
	require ('conexao.php');
	
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


	$id = $_GET['id'];
	$sql = "SELECT idprocesso, numero_processo, p.nome ,data_abertura, a.descricao, s.descricao as situacao,comarca, cnj from processo
			inner join pessoas p on ( pessoas_idpessoas = p.idpessoas )
			inner join assuntos a on ( assuntos_idassuntos = a.idassuntos )
			inner join situacao s on ( situacao_idsituacao = s.idsituacao ) where idprocesso = ".$id;

	$result = mysqli_query($conexao,$sql) or die();
	$processo = mysqli_fetch_array($result);

	//echo "<pre>";
	//print_r($pessoa);
	//echo "</pre>";

	$sqlmovimentacao = "select data_hora, descricao, tipo from movimentacao
			   inner join tipo_movimentacao on ( idtipo_movimentacao = tipo_movimentacao_idtipo_movimentacao )
			   where processo_idprocesso =" .$id;

	$resultmovimentacao = mysqli_query($conexao,$sqlmovimentacao) or die();


	$data_processo = date("d/m/Y",strtotime(str_replace('-','/',$processo['data_abertura'])));
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
		<br>
		<dl class="dl-horizontal">
			<dt>Numero do Processo:</dt>
			<dd><?php echo $processo['numero_processo']; ?></dd>

			<dt>CNJ:</dt>
			<dd><?php echo $processo['cnj']; ?></dd>

			<dt>Assistido:</dt>
			<dd><?php echo $processo['nome']; ?></dd>

			<dt>Data de Abertura:</dt>
			<dd><?php echo $data_processo; ?></dd>

			<dt>Assunto:</dt>
			<dd><?php echo $processo['descricao'];?></dd>

			<dt>Comarca:</dt>
			<dd><?php echo $processo['comarca']; ?></dd>

			<dt>Situação:</dt>
			<dd><?php echo $processo['situacao']; ?></dd>
			
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
					 	$data = date("d/m/Y H:i:s", strtotime($data));

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
		</div>
	</div>
</div>

<?php require_once 'footer.html'; ?>