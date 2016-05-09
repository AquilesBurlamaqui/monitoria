    <?php
       // Start the session
       session_start();
       if($_SESSION["login"]!=true)
          echo "<h2>Usuário não logado</h2>";
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
      <!-- Menu de navegação -->
    <header>
      <?php
        include("menu.php");
      ?>
    </header>

    <!-- Conteúdo -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bem vindo, <?php echo $_SESSION["nome"]?></h1>
        <p>A Monitoria interliga monitores e alunos em busca de soluções para problemas</p>
        <p><a class="btn btn-primary" href="form_problema.php" role="button">Cadastrar problema</a></p>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>

  </body>
</html>
<?php
  }
?>
