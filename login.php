<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>
			Login
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
      <input type="text" placeholder="name"/>
      <input id="" type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
	<input type="button" id="" name="filter" value="Filter" />      
<button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post">
      <input id="email_login" type="text" placeholder="usuario"/>
      <input id="senha_login" type="password" placeholder="senha"/>
	<input type="button" id="bt_login" name="bt_login" value="LOGIN"/>      
      <p class="message">Nã possui cadastro? <a href="cadastro.php">cadastre-se</a></p>
    </form>
  </div>
</div>
</body>
</html>
