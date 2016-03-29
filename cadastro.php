
<!DOCTYPE html>
<html lang="pt-br">
        <div>
        </br>
        </div>
        <head>
                <meta charset="UTF-8"/>
                <title>Página login</title>
                 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
       		 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        </head>
        <body>
		
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="nav$
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="login.php">Início</a>
          <a class="navbar-brand" href="cadastro.php">Cadastre-se</a>
	          </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="verificaLogin.php" method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="senha">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>



                <form action="sucesso.php" method="post">
			<h1>Cadastro</h2>
			Nome: <input type="text" name="nome"></br></br>
                        Email:<input type="email" name="email"></br></br>
                        Senha:<input type="password" name="senha"></br></br>
                        <input type="submit" value="Submit">
                </form>
              
        </body>
        <script>

</html>
