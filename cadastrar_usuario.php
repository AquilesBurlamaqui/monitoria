<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
$validaremail = pg_query("SELECT * FROM monitoria.usuario WHERE email='$email'") or die("Query Failed" . pg_last_error());
$contar = pg_num_rows($validaremail);
if ($contar == 0) {
        $insert = pg_query("INSERT INTO monitoria.usuario(nome, email, senha) VALUES('$nome','$email','$senha')");
        $redirect = "http://69.60.115.37/";
        header("location:$redirect");
}

pg_close($dbconn);
?>



