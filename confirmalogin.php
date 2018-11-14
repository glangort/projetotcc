<?php  require 'conexao.php';

$login = $_POST["login"];
$senha = $_POST["senha"];

$sql = sprintf("SELECT COUNT(*) as qdt FROM usuarios WHERE login = '%s' AND senha = '%s'", $login, $senha);

$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($result);

        if ( $dados['qdt'] <= 0 ){
        	echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
        	die();

        }else{
          setcookie("login",$login);
          header("Location:cad_pessoa.php");

        }