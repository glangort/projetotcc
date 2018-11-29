<!DOCTYPE html>
<?php error_reporting(1); ?>
<head>
      <style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }
    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }
    ul.timeline > li {
        margin: 20px 0;
        padding-left: 20px;
    }
    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
    </style>


    <!-- Required meta tags -->
    <html lang="pt-br">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=2, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>NPJ - IDEAU</title>
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="principal.php">Pessoas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="processos.php"> Processos <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropMov" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Movimentações
        </a>
        <div class="dropdown-menu" aria-labelledby="dropMov">
          <a class="dropdown-item" href="cad_movimentacao.php">Lançar Movimentação</a>
        </div>
      </li>

		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administrador
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="cad_tipo_movimentacao.php">Tipos de Movimentação</a>
          <a class="dropdown-item" href="cad_assunto.php">Assuntos Processuais</a>
          <a class="dropdown-item" href="cad_situacao.php">Situações</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">...</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropRel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Relatórios
        </a>
        <div class="dropdown-menu" aria-labelledby="dropRel">
          <a class="dropdown-item" href="#">Lista de Pessoas</a>
          <a class="dropdown-item" href="#">Lista de Processos</a>
        </div>
      </li>

    </ul>
  </div>
</nav>
</head>

