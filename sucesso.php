<html>
	<head><title>bla</title></head>
<body>
<?php

$email = $_POST["email"];
echo $email;
echo "</br>";
$senha = $_POST["senha"];
echo $senha;
echo "</br>";
$nome = $_POST["nome"];
echo $nome;
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    or die('Could not connect: ' . pg_last_error());


$validaremail = pg_query("SELECT * FROM usuario_allanbw WHERE email='$email'") or die("Query Failed" . pg_last_error()); //Testa se o email já existe.
$contar = pg_num_rows($validaremail); //Conta quantas linhas encontraram determinado email no banco de dados.
if ($contar == 0) { //Caso a quantidade de linhas seja 0, ou seja, o email não estiver no banco
    $insert = pg_query("INSERT INTO usuario_allanbw(nome, email, senha) VALUES('$nome','$email','$senha')");
}

?>
</br></br>
<a href="login.php"> Faça o login </a>
</body>
<html>
