<div class="container">


<?php
   // Start the session
   session_start();
   if($_SESSION["login"]!=true) 
      echo "Usuário não logado";
   else {

?>
<!DOCTYPE html>
<html>
<head>
<title>Monitoria</title>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bootstrap theme</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="listar_usuarios.php">Usuarios</a></li>
            <li><a href="listar_problemas.php">Problemas</a></li>
           </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container theme-showcase" role="main">
<div class="jumbotron">

<h2>Bem vindo, <?php echo $_SESSION["nome"]?></h2>
<p>A Monitoria interliga monitores e alunos em busca de soluções para problemas</p>
<a class="btn btn-primary" href="form_problema.php" role="button">Cadastrar problema</a>

</div>
<a href="logout.php">Logout</a>
</br>
</div>


</body>
</html> 

<?php
  }
?>
