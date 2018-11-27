<?php  require 'conexao.php';

session_start();
$login = $_POST["login"];
$senha = $_POST["senha"];

$sql = sprintf("SELECT * FROM usuarios WHERE login = '%s' AND senha = '%s'", $login, $senha);

$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($result);

           	if( mysqli_num_rows ($result)  <= 0 ){
				unset ($_SESSION['login']);
				unset ($_SESSION['senha']);
				unset ($_SESSION['idusarios']);
				unset ($_SESSION['nome']);
				echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
        		die();
			}
			else{
				$_SESSION['login'] = $login;
				$_SESSION['senha'] = $senha;
				$_SESSION['idusario'] = $dados['idusuarios'];
				$_SESSION['nome'] = $dados['nome'];
				setcookie("login",$login);
				header('location:principal.php');
			  }
			?>