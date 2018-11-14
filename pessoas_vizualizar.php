<?php 
	require_once('header.php'); 
	require ('conexao.php');
	
	$id = $_GET['id'];
	
	$sql = "select id, nome, cpf, endereco, datanascimento,
	genitor1, genitor2, endereco,
	bairro, cep, genero,
	cidade, uf, renda, celular,
	telefone, cpf from pessoas where id =".$id;
		
	$result = mysqli_query($conexao,$sql) or die('erro');
	$pessoa = mysqli_fetch_array($result);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container-fluid">
	<dl class="dl-horizontal">
		<dt>Nome:</dt>
		<dd><?php echo $pessoa['nome']; ?></dd>

		<dt>CPF:</dt>
		<dd><?php echo $pessoa['cpf']; ?></dd>

		<dt>Data de Nascimento:</dt>
		<dd><?php echo $pessoa['datanascimento']; ?></dd>

		<dt>Gênero:</dt>
		<dd><?php echo $pessoa['genero'];?></dd>
	</dl>

	<dl class="dl-horizontal">
		<dt>Endereço:</dt>
		<dd><?php echo $pessoa['endereco']; ?></dd>

		<dt>Bairro:</dt>
		<dd><?php echo $pessoa['bairro']; ?></dd>

		<dt>CEP:</dt>
		<dd><?php echo $pessoa['cep']; ?></dd>

		<dt>Data de Cadastro:</dt>
		<dd><?php echo $pessoa['datacadastro']; ?></dd>
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

	<div id="actions" class="row">
		<div class="col-md-12">
		  <a href="edit.php?id=$id" class="btn btn-primary">Editar</a>
		  <a href="index.php" class="btn btn-default">Voltar</a>
		</div>
	</div>
</div>
<?php require_once 'footer.html'; ?>