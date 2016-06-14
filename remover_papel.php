<?php
	session_start();
	$id = $_POST["id"];
	
	echo $id;
	$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
	$insert = pg_query("DELETE FROM monitoria.papel WHERE id=('$id')");
	$redirect = "http://69.60.115.37/~athos/monitoria/sucesso.php?msg_info=Papel Removido";
	header("location:$redirect");

	pg_close($dbconn);
?>



