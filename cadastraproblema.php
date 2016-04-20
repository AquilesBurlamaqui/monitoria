<?php
  
	$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
  	
	$cod = "SELECT id from monitoria.usuario WHERE nome='". $_POST["nomeUsuario"]  ."';";
	$result = pg_query($dbconn, $cod);
	$row = pg_fetch_array($result);

	$sql = "INSERT INTO monitoria.problema(definicao, usuario_id) VALUES('" . $_POST["problema"] . "', ".$row["id"].")";
  	
	$resultado = pg_query($dbconn, $sql);
	$response_array['status'] = 'success';
	header('Content-type: application/json');
	echo json_encode($response_array);
  	pg_close($dbconn);
?>
