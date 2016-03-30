<?php
        session_start();
        //verifica se tem algum usuario logado
        if(!isset($_SESSION['login']) || !isset($_SESSION['senha']))
        {
		//header("Location: login.php");
		echo("nao logado");
	}
	else
	{
		echo("logado");
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>
			Monitoria
		</title>
		<meta charset="UTF-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
		</script><script type="text/javascript" src="js/scripts.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="css/estilo.css" crossorigin="anonymous">
	</head>
	<body>
		<div class="alert alert-success fade in" id="sucesso" style="display:none; margin-top:18px;" >
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Sucesso</strong>
		</div>
		<div class="alert alert-danger fade in" style="display:none; margin-top:18px" id="error-div">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    			<strong>Erro.</strong> usuario e ou senha incorretos
		</div>
		<div class="login-page">
			<div class="form">
				<form class="register-form" method="post">
					<input type="text" id="nome_usuario" placeholder="nome"/>
					<input type="text" id="email_usuario" placeholder="email"/>
					<input id="senha_usuario" type="password" placeholder="senha"/>
					<!--<input type="button" id="bt_cadastrar" name="filter" value="Filter" />-->      
					<button type="button" id="bt_cadastrar">CRIAR</button>
      					<p class="message">Já possui cadastro? <a href="#">Entrar</a></p>
   				 </form>
    				<form class="login-form" method="post">
      					<input id="email_login" type="text" placeholder="usuario"/>
      					<input id="senha_login" type="password" placeholder="senha"/>
					<button type="button" id="bt_login">LOGIN</button>
					<p class="message">Nao possui cadastro? <a href="#">Crie uma conta</a></p>
    				</form>
  			</div>
		</div>
	</body>
</html>
