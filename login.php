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
		<!-- <link rel="stylesheet" href="login.css" crossorigin="anonymous"> -->

	</head>
	<body>
		<div class="alert alert-success fade in" id="sucesso" style="display:none; margin-top:120px;" >
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Sucesso</strong>
		</div>
		<div class="alert alert-danger fade in" style="display:none; margin-top:18px" id="error-div">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    			<strong>Erro.</strong> usuario e ou senha incorretos
		</div>		


		<nav class="navbar navbar-inverse navbar-fixed-top">
      		<div class="container">
       		 <div class="navbar-header">
          		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            		<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          
          <a class="navbar-brand" href="login.php">Início</a>
	  <a class="navbar-brand" href="cadastro.php">Cadastre-se</a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" id="formulario_login" method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email" id="email_login">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="senha" id="senha_login">
            </div>
           <input id="bt_login" class="btn btn-success" type="button" value="Entrar">
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

		<img src="http://www.raesaaz.net/wp-content/uploads/2015/12/goku.png"/>
	

	</body>
	
</html>
