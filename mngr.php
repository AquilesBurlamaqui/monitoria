<?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
or die('Could not connect: ' . pg_last_error());

$check = $_POST['var'];

if ($check == "criar"){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$pw = $_POST['pw'];

	if ($email == ""){
		echo 'erro:Email invalido';
	} else if ($nome == ""){
		echo 'erro:Nome invalido';
	} else if ($pw == ""){
		echo 'erro:Senha invalida';
	} else {
		$result = pg_query("SELECT * FROM usuario_mateusbw WHERE email='$email'") or die('Query failed: ' . pg_last_error());
		$count = pg_num_rows($result);

		if ($count == 0){
			$insert = pg_query("INSERT INTO usuario_mateusbw(nome,email,password) VALUES('$nome','$email','$pw')");
		} else {
			echo 'erro:Email existente';
		}


		pg_free_result($result);
		pg_close($dbconn);
	}
} else if ($check == "excluir"){
	$id = $_POST[id];

	if ($id == ""){
		echo 'erro:ID invalido';
	} else {
		$result = pg_query("SELECT * FROM usuario_mateusbw WHERE id='$id'") or die('Query failed: ' . pg_last_error());
		$count = pg_num_rows($result);

		if ($id == 3){
			echo 'erro:Conta de administrador impossibilitada de ser excluida';
		}
		else if ($count == 0) {
			echo 'erro:ID inexistente';
		} else {
			$result = pg_query("DELETE FROM usuario_mateusbw WHERE id='$id'") or die('Query failed: ' . pg_last_error());
		}

		pg_free_result($result);
		pg_close($dbconn);
	}
} else {
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$pw = $_POST['pw'];
	if ($id == ""){
		echo 'erro:ID invalido';
	} else if ($email == ""){
		echo 'erro:Email invalido';
	} else if ($nome == ""){
		echo 'erro:Nome invalido';
	} else if ($pw == ""){
		echo 'erro:Senha invalida';
	} else {
		$result = pg_query("SELECT * FROM usuario_mateusbw WHERE id='$id'") or die('Query failed: ' . pg_last_error());
		$result2 = pg_query("SELECT * FROM usuario_mateusbw WHERE email='$email'") or die('Query failed: ' . pg_last_error());
		$count = pg_num_rows($result);
		$count2 = pg_num_rows($result2);

		if ($count2 != 0){
			echo 'erro:Email vinculado a outra conta';
		} else if ($count == 0){
			echo 'erro:ID inexistente';
		} else {
			$result = pg_query("UPDATE usuario_mateusbw SET nome='$nome',email='$email',pw='$pw' WHERE id='$id'") or die('Query failed: ' . pg_last_error());
		}

		pg_free_result($result);
		pg_close($dbconn);
	}
}


?>