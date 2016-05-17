<?php
session_start();
   if($_SESSION["login"]) { 
    	// Connecting, selecting database
    	$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
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
    	$query = 'SELECT * FROM monitoria.papel';
    	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

    	// Printing results in HTML
      echo "<h1>Lista de Papeis</h1>";
      echo "<table>";
    	while ($line = pg_fetch_row($result)) {
                echo "<tr>";
                echo "<td>".$line[0]."</td><td>".$line[1]."</td><td><a href='remover_papel.php?papel_id=".$line[0]."'><img src='imagens/delete.gif'></a></td>";
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

