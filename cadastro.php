<?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
	or die('Could not connect: ' . pg_last_error());
    
	$nome=$_POST["nome"];
	$email=$_POST["email"];
        $password=MD5($_POST["senha"]);


    
	$validarnome= pg_query("SELECT * FROM usuario_priscilabw WHERE nome='$nome'") or die("Query Failed" . pg_last_error());
	$contar = pg_num_rows($validarnome); //Conta quantas linhas encontraram determinado email no banco de dados.
    
	if ($contar == 0) { //Caso a quantidade de linhas seja 0, ou seja, o email não estiver no banco
   		 echo "Cadastro feito com sucesso!";
   	 	$insert = pg_query("INSERT INTO usuario_priscilabw(nome, email, senha) VALUES('$nome','$email','$password')");
    	}
	pg_close($dbconn);
?>
