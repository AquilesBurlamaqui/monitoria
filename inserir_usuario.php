<?php
	//conexao com banco de dados
	$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die ('Could not connect: ' . pg_last_error());

	//$json = json_decode($_POST['dadosFormulario'], true);

	$nome = $_POST["n"];
	$email = $_POST["e"];
	$senha = md5($_POST["s"]);

	$sql = "INSERT INTO tb_usuario_jailsonbw (nome, email, password) VALUES('". $nome ."', '". $email ."', '". $senha ."');";
	pg_query($dbconn, $sql);
	pg_close($conexao);

	header('Content-type: application/json');
    	$response_array['status'] = 'success'; 
	echo json_encode($response_array);
?>
