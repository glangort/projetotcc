<?php

	$conexao = mysqli_connect("localhost", "root", "mysql", "dbProjeto");
	mysqli_query($conexao, "SET character_set_results=utf8");
	mysqli_query($conexao, "SET character_set_connection=utf8");
	mysqli_query($conexao, "SET character_set_client=utf8");

	mysqli_set_charset($conexao,"uft8");

	if (!$conexao) {
	    echo "Erro ao conectar no banco de dados<br>";
	    // echo "Descrição do erro: " . mysql_connect_error() . PHP_EOL;
	    exit;
	}

?>