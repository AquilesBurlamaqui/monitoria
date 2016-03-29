<?php
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
	or die('Could not connect: ' . pg_last_error());
	
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$alterar = $_POST["alterar"];
	
	if(empty($nome) || empty($email) || empty($login) || empty($senha)){
		//$redirect = "http://69.60.115.37/~hugobw";
		
        echo "<script language='javascript' type='text/javascript'>alert('Preenchimento incorreto, favor tentar novamente!');window.location.href='index.html';</script>";
        
        //die();
        
        //header("location:$redirect");	
	}
	else
	{
		$senha = md5($senha);
	
		$validarLogin = pg_query("SELECT * FROM usuario_hugobw WHERE login='$login'") or die("Query Failed" . pg_last_error());
		$contador = pg_num_rows($validarLogin);
	
		if($contador == 0){
			$insert = pg_query("INSERT INTO usuario_hugobw(nome, email, login, senha) VALUES('$nome', '$email', '$login', '$senha')");
		
			$redirect = "http://69.60.115.37/~hugobw";
		    header("location:$redirect");
		}
		else{
		
			if(empty($alterar))
			{
				$redirect = "http://69.60.115.37/~hugobw";
		
				echo "<script language='javascript' type='text/javascript'>alert('Login ja existente');window.location.href='index.html';</script>";
				
				die();
				
				header("location:$redirect");
			}
			else
			{
				//AQUI FAZER A MODIFICAÇÃO DO USUARIOS
			}
		}
	}
	
	pg_close($dbconn);
?>
