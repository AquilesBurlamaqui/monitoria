<!DOCTYPE html>
<html>
<head>
<title>Monitoria</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta charset="latin-1">
</head>
<body>

<div class="container">
	<div class="jumbotron">
		<h1>Esta é a página do nosso sistema de monitoria</h1>
		<h2>A Monitoria interliga monitores e alunos em busca de soluções para problemas</h2>
	</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Login</h3>
  </div>
  <div class="panel-body">
    <form action="login.php" method="post">
        <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
        </div>
 	<div class="form-group">
    		<label for="exampleInputPassword1">Password</label>
    		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="senha">
  	</div>
	<button type="submit" class="btn btn-primary">Log in</button>
</form> 
<a href="form_usuario.php">Cadastrar</a>
  </div>
</div>

<!-- codigo anterior -->
<!--<form action="login.php" method="post">
	<div class="form-group">
   		<label for="exampleInputEmail1">Email address</label>
    		<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
 	 </div>
	email:</br>
	<input type="email" name="email"></br>
	senha:</br>
	<input type="password" name="senha"></br>
	<input type="submit" value="Entrar">
</form> 
<a href="form_usuario.php">Cadastrar</a> -->

<!-- final do codigo anterior -->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html> 
