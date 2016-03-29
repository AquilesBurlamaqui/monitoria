<?php
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
	or die('Could not connect: ' . pg_last_error());
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	$senha = md5($senha);
	
	$validarSenha = pg_query("SELECT * FROM usuario_hugobw WHERE login='$login' AND senha='$senha'") or die("Query Failed" . pg_last_error());
	
	if (pg_num_rows($validarSenha)!=0) {
		//$redirect = "http://69.60.115.37/~hugobw/mainPage.html";
		
		//AQUI EU ABRO UMA SESSÃO PARA PASSAR INFORMAÇÃO PARA A PROXIMA PAGINA
		session_start();
		$_SESSION['login'] = $login;
		//FIM 
		
		echo "<script language='javascript' type='text/javascript'>;window.location.href='mainPage.php';</script>";
		
		//die();
		
        //header("location:$redirect");
	}
	else{
		$redirect = "http://69.60.115.37/~hugobw";
		
        echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorreto');window.location.href='index.html';</script>";
        
        die();
        
        header("location:$redirect");
	}
	
	pg_close($dbconn);
?>
