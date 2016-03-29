<?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    or die('Could not connect: ' . pg_last_error());
    
    $nome=$_POST["login"];
    $email=$_POST["email"];
    $password=$_POST["senhacadastrar"];
    $password=md5($password);
    
    $validarlogin = pg_query("SELECT * FROM usuario_otaviobw WHERE email='$email'") or die("Query Failed" . pg_last_error());
    $contar = pg_num_rows($validarlogin); //Conta quantas linhas encontraram determinado email no banco de dados.
    
    if ($contar == 0) { //Caso a quantidade de linhas seja 0, ou seja, o email não estiver no banco
            echo $nome;
            echo $email;
            echo $password;
            $insert = pg_query("INSERT INTO usuario_otaviobw(nome, email, password) VALUES('$nome','$email','$password')");
        }
	else
	{
		echo "usuario jà foi cadastrado"
 	
	}
    pg_close($dbconn);
?>

