<!DOCTYPE html>
<html>
<head>
  <title>Monitorando - Cadastro de Problema</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <meta charset="utf-8">
  </head>
<body>
  <!-- Menu de navegação -->
  <header>
    <?php
      include("menu.php");
    ?>
  </header>
  <div class="container">
  <h1>Cadastro de Problema</h1>
  <form method="POST" action="cadastrar_problema.php">
  	  <p>Descrição:</p>
  	  <p><textarea name="definicao" rows="10" cols="60"></textarea></p>
        <p><button type="submit" class="btn btn-primary" value="submit">Cadastrar</button></p>
   </form>
   </div>

</body>
</html>
