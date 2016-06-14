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
        echo "<table>";
	while ($line = pg_fetch_row($result)) {
            echo "<tr>";
            echo "<td>".$line[0]."</td><td><a href='detalhe_problema.php?problema_id=".$line[0]."'>".$line[1]."</a></td><td>Autor:".getUser($line[2])."</td>";
            echo "</tr>";
            $usuario_id=$line[2];
	}
        echo "</table>";

        echo "Solucoes:</br>";
	// Performing SQL query
	$query = 'SELECT * FROM monitoria.solucao WHERE problema_id='.$_GET['problema_id'];
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
        $usuario_id;
	// Printing results in HTML
        echo "<table>";
	while ($line = pg_fetch_row($result)) {
            echo "<tr>";
            echo "<td>id:".$line[0]."</td><td>Avaliacao:".$line[2]."Solucao: ".$line[1]."</a></td><td>Autor:".getUser($line[4])."</td>";
            echo "</tr>";
            $usuario_id=$line[2];
	}
        echo "</table>";  
 
  
        echo "<a href='form_solucao.php?problema_id=".$_GET["problema_id"]."&usuario_id=".$usuario_id."'>Cadastrar Solucao</a>";
echo "</br><a href='sucesso.php'>Voltar</a>";
   // Free resultset
   pg_free_result($result);

   // Closing connection
   pg_close($dbconn);
}else {
  echo "Usuário não logado"; 
} 
?>

