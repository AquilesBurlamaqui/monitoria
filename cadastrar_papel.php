<?php
	session_start();
	$nome = $_POST["nome"];
	
	echo $nome;
	$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
	$insert = pg_query("INSERT INTO monitoria.papel(nome) VALUES('$nome')");
	$redirect = "http://69.60.115.37/~athos/monitoria/sucesso.php?msg_info=Papel Cadastrado";
	header("location:$redirect");

	pg_close($dbconn);
?>



