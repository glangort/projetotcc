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
	$sql = "select idpessoas, nome, cpf, endereco, data_nascimento,
	genitor1, genitor2, endereco, rg,
	bairro, cep, genero,
	cidade, uf, renda, celular,
	telefone, cpf from pessoas where idpessoas =".$id;

	 
	$result = mysqli_query($conexao,$sql) or die();
	$pessoa = mysqli_fetch_array($result);

	$datanascimento = date("d/m/Y",strtotime(str_replace('-','/',$pessoa['data_nascimento'])));  
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container-fluid">
	<dl class="dl-horizontal">
		<dt>Nome:</dt>
		<dd><?php echo $pessoa['nome']; ?></dd>

		<dt>CPF:</dt>
		<dd><?php echo $pessoa['cpf']; ?></dd>

		<dt>RG:</dt>
		<dd><?php echo $pessoa['rg']; ?></dd>

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

		<dt>Cidade:</dt>
		<dd><?php echo $pessoa['cidade']; ?></dd>

		
	</dl>

	<dl class="dl-horizontal">

		<dt>Data de Cadastro:</dt>
		<dd><?php echo '25/10/2018'; ?></dd>

		

		<dt>Telefone:</dt>
		<dd><?php echo $pessoa['telefone']; ?></dd>

		<dt>Celular:</dt>
		<dd><?php echo $pessoa['celular']; ?></dd>

		<dt>UF:</dt>
		<dd><?php echo $pessoa['uf']; ?></dd>

	</dl>

<?php  echo "
	<div id='actions' class='row'>
		<div class=	'col-md-12'>
		  <a href='edit.php?id=$id' class='btn btn-primary'>Editar</a>
		  <a href='principal.php' class='btn btn-default'>Voltar</a>
		  <a href='relatorio_pessoa.php?id=$id' class='btn btn-default btn-success'><i class='fa fa-eye'></i>Gerar PDF</a>
		</div>
	</div>
</div>  "?>;

<?php require_once 'footer.html'; ?>