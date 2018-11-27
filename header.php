<!DOCTYPE html>
<?php //error_reporting(0); ?>
<head>
    <!-- Required meta tags -->
    <html lang="pt-br">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=2, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Teste</title>
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="principal.php">Pagina Inicial</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="processos.php"> Processos <span class="sr-only">(current)</span></a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>-->
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administrador
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="cad_tipo_movimentacao.php">Cadastro Tipo de Movimentação</a>
          <a class="dropdown-item" href="cad_assunto.php">Cadastro de Assuntos Processuais</a>
          <a class="dropdown-item" href="cad_situacao.php">Cadastro de Situação</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">...</a>
        </div>
      </li>
    </ul>
  </div>
</nav> 
</head>

