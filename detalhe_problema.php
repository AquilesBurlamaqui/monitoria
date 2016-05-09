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
  <div class="container" style="margin-top: 50px">
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
        $query = 'SELECT * FROM monitoria.problema WHERE id='.$_GET['problema_id'];
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
              $usuario_id;
        // Printing results in HTML

        while ($line = pg_fetch_row($result)) {
                  echo "
                  <h2>Problema</h2>
                  <p>".$line[1]."</p>
                  <small>Autor: ".getUser($line[2])."</small>
                  ";
                  $usuario_id=$line[2];
        }
              echo "<hr>";
              echo '<h3>Solucoes</h3>

              </br>';
        // Performing SQL query
        $query = 'SELECT * FROM monitoria.solucao WHERE problema_id='.$_GET['problema_id'];
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
              $usuario_id;
        // Printing results in HTML
              echo '<table class="table">';
              echo '
              <thead>
                      <tr>
                        <th>#</th>
                        <th>Avaliações</th>
                        <th>Solução</th>
                        <th>Criador</th>
                      </tr>
                    </thead>
            ';
        while ($line = pg_fetch_row($result)) {
                  echo "<tr>";
                  echo "
                  <td>".$line[0]."</td>
                  <td>".$line[2]."</td>
                  <td>".$line[1]."</td>
                  <td>".getUser($line[4])."</td>";
                  echo "</tr>";
                  $usuario_id=$line[2];
        }
              echo "</table>";


              echo "<a href='form_solucao.php?problema_id=".$_GET["problema_id"]."&usuario_id=".$usuario_id."'>Cadastrar solucao</a>";
         // Free resultset
         pg_free_result($result);
         // Closing connection
         pg_close($dbconn);
      }else {
        echo "Usuário não logado";
      }
      ?>
      </div>

  </body>
</html>

