<!DOCTYPE html>
<html>
<head>
  <title>Monitoria</title>
  <meta charset="utf-8">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta charset="utf-8">
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
        <h1>Problemas</h1>
        <p>Conheça abaixo os problemas cadastrados no sistema Monitorando</p>
      </div>
  </div>
  <div class="container">
    <?php
    session_start();
       if($_SESSION["login"]) {
    	// Connecting, selecting database
    	$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
        	or die('Could not connect: ' . pg_last_error());
            function getUser($id) {
               $verifica = pg_query("SELECT * FROM monitoria.usuario WHERE id='$id'") or die("Query Failed" . pg_last_error());
    	   if (pg_num_rows($verifica)>0) {
                  $_SESSION["login"]=true;
    	      $_SESSION["email"]=$email;

    	      while ($line = pg_fetch_row($verifica)) {
     	         return $line[1];
    	      }
               }
       	   return "null";
    	}

    	// Performing SQL query
    	$query = 'SELECT * FROM monitoria.problema';
    	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

    	// Printing results in HTML
        echo '<table class="table">';
        echo '
        <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Criador</th>
                </tr>
              </thead>
      ';
    	while ($line = pg_fetch_row($result)) {
                echo "<tr>";
                echo "<td>".$line[0]."</td><td><a href='detalhe_problema.php?problema_id=".$line[0]."'>".$line[1]."</a></td><td>".getUser($line[2])."</td>";
                echo "</tr>";
    	}
            echo "</table>";

       // Free resultset
       pg_free_result($result);

       // Closing connection
       pg_close($dbconn);
    }else {
      echo "Usuário não logado";
    }
    ?>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
