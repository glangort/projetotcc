<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Núcleo de Praticas Juridicas - Faculdade IDEAU</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <style type="text/css">
    	.login-form {
    		width: 340px;
        	margin: 50px auto;
    	}
        .login-form form {
        	margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="login-form">
    <form action="confirmalogin.php" method="post">
        <h2 class="text-center">Login</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Usuario" required="required" name="login">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" required="required" name="senha">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <div class="clearfix">
            <a href="#" class="pull-right">Esqueceu Sua Senha?</a>
        </div>        
    </form>
</div>
</body>
</html>                                		                            