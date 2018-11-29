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
	$usuario_id = $_SESSION['idusario'];
	$usuario_nome = $_SESSION['nome'];
?>

<div class="container-fluid">
          <form action="lista_movimentacao.php" method="post">
			  <!-- area de campos do form -->
				<div class="row">
					<div class="form-group col-md-5">
						<label for="id_pessoa">Pessoa:</label><br>
						<select name="idpessoa" id="idpessoa" class="selectpicker" required="required" data-live-search="true">
						<option value="">--Selecione--</option>
						<?php
							$sql = "select idpessoas, nome from pessoas order by nome";
							$res = mysqli_query($conexao, $sql);
							while ($temp = mysqli_fetch_array($res)) {
								$idpessoas = $temp['idpessoas'];
								$nome = $temp['nome'];
								echo "<option value='$idpessoas'>$nome</option>";
								}?>
						</select>
					</div>
				</div>

				<br>
				<div id="actions" class="row">
					<div class="col-md-12">
				  		<button type="submit" class="btn btn-primary">Buscar</button>
				 		<a href="index.php" class="btn btn-default">Cancelar</a>
				</div>
			  </div>
			</form>
    </div>
</div>


<?php require_once 'footer.html';  ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/i18n/defaults-pt_BR.min.js"></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
    <script>
	    $('.input-group.date').datepicker({format: "dd/mm/yyyy"});
    </script>