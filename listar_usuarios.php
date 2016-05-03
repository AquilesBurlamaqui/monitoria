<!DOCTYPE html>
<html>
<head>
<title>Monitoria</title>
<meta charset="utf-8">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta charset="latin-1">
</head>
<body>
<div class="container">
<h2>Usuários</h2>
<?php
session_start();
   if($_SESSION["login"]) { 
	// Connecting, selecting database
	$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    	or die('Could not connect: ' . pg_last_error());

	// Performing SQL query
	$query = 'SELECT * FROM monitoria.usuario';
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

	// Printing results in HTML
	echo "<table>\n";
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    		echo "\t<tr>\n";
    		foreach ($line as $col_value) {
        		echo "\t\t<td>$col_value</td>\n";
    		}
    	echo "\t</tr>\n";
   }
   echo "</table>\n";

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
