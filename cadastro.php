<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$password = MD5($_POST['password']); //MD5 serve para criptografar a senha

// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    or die('Could not connect: ' . pg_last_error());

//cadastro no bd
$validaremail = pg_query("SELECT * FROM usuario_arthurbw WHERE email='$email'") or die("Query Failed" . pg_last_error());
$contar = pg_num_rows($validaremail); //Conta quantas linhas encontraram determinado email no banco de dados.
if ($contar == 0) { //Caso a quantidade de linhas seja 0, ou seja, o email não estiver no banco
    $insert = pg_query("INSERT INTO usuario_arthurbw(nome, email, password) VALUES('$nome','$email','$password')");
}

echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado!');window.location.href='index.html';</script>";
//$redirect = "http://69.60.115.37/~arthurbw/index.html";
//header("location:$redirect);

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>


