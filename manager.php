<?php
session_start();
if ($_SESSION['login'] != "l"){
  header('Location: index.php');  
  session_unset();
  session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Management Page</title>

  <meta name=viewport content="width=device-width, initial-scale=1">

  <link href="styles.css" rel="stylesheet" type="text/css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body id="b">
  <br><br>
  <button type="button" style="width:100%" class="btn btn-primary">Management</button>
  <form action="" id="formc" method="post">
    <div class="container" style="width: 100%" id="cont">
      <br><br>
      <div id="left" style="float:left; width: 18%;">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading text-center">Criar Conta</div>
            <div class="panel-body text-center" style="display: table-cell;">
              <fieldset>
                Nome:<br>
                <input type="text" name="nome" id="nome">
                <br>
                E-mail:<br>
                <input type="text" name="email" id="email">
                <br>        
                Password:<br>
                <input type="password" name="pw" id="pw">
                <br><br>
                <input type="submit" value="Criar" class="btn btn-primary" role="button">
                <input type="hidden" name="var" value="criar"> 
                <br>
              </fieldset>
            </div>            
          </div>
        </div>
      </div>
    </form>
    <form action="" id="formd" method="post">
      <div id="middle" style="float:left; width: 18%;">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading text-center">Excluir Conta</div>
            <div class="panel-body text-center" style="display: table-cell;">
              <fieldset>
                ID:<br>
                <input type="text" name="id" id="id">
                <br><br>  
                <input type="submit" value="Excluir" class="btn btn-primary" role="button">
                <input type="hidden" name="var" value="excluir">
                <br>
              </fieldset>
            </div>            
          </div>
        </div>
      </div>
    </form>
    <form action="" id="forme" method="post">
      <div id="right" style="float:left; width: 18%;">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading text-center">Editar Conta</div>
            <div class="panel-body text-center" style="display: table-cell;">
              <fieldset>
                ID:<br>
                <input type="text" name="id" id="id">
                <br>
                Nome:<br>
                <input type="text" name="nome" id="nome">
                <br>
                E-mail:<br>
                <input type="text" name="email" id="email">
                <br>        
                Password:<br>
                <input type="password" name="pw" id="pw">
                <br><br>
                <input type="submit" value="Editar" class="btn btn-primary" role="button">
                <input type="hidden" name="var" value="editar">
                <br>
              </fieldset>
            </div>            
          </div>
        </div>
      </div>
    </form>
    <form action="">
      <div id="left" style="float:left; width: 18%;">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading text-center">Acessar P&aacuteginas</div>
            <div class="panel-body text-center" style="display: table-cell;">
              <fieldset>
                <br>
                <a button type="button" style="margin-left:30px;" id="botao1" href="index.php" class="btn btn-primary">Login Page</a><br><br>
                <a button type="button" style="margin-left:30px; id="botao2" href="register.php" class="btn btn-primary">Register Page</a>
                <br>
              </fieldset>
            </div>            
          </div>
        </div>
      </div>
    </form>
    <div id="contas" style="float:right; width: 25%;">
      <div class="col-sm-12">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">Contas</div>
          <div class="panel-body text-center" style="display: table-cell;">
            <fieldset>
              <?php
              $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
              or die('Could not connect: ' . pg_last_error());

              $result = pg_query("SELECT * FROM usuario_mateusbw") or die('Query failed: ' . pg_last_error());

              $count = pg_num_rows($result);

              $i = 0;
              echo '<html><body><table><tr>';
              while ($i < pg_num_fields($result)-1)
              {
                $fieldName = pg_field_name($result, $i);
                echo '<td>' . $fieldName . '</td>';
                $i = $i + 1;
              }
              echo '</tr>';
              $i = 0;

              while ($row = pg_fetch_row($result)) 
              {
                echo '<tr>';
                $count = count($row);
                $y = 0;
                while ($y < $count-1)
                {
                  $c_row = current($row);
                  echo '<td>' . $c_row . '</td>';
                  next($row);
                  $y = $y + 1;
                }
                echo '</tr>';
                $i = $i + 1;
              }
              pg_free_result($result);

              pg_close($dbconn);
              ?>              </fieldset>
            </div>            
          </div>
        </div>
      </div>



    </div>
  </div>

</body>
</html>

<script>
$(document).ready(function(){
  $('form').submit(function(ev){
    var x = $(this).serialize();
    ev.preventDefault();
    $.ajax({
      url: 'mngr.php',
      type: 'POST',
      dataType: 'text',
      data: x,
    })
    .done(function(x) {
      var y = JSON.stringify(x);
      str = y.replace(/"/g, "");
      if (str.match(/erro/)){
        var n = str.split(":");
        alert(n[1]);
      }
      else {
        document.location.href = str;
      }
    })
    
  });
});
</script>