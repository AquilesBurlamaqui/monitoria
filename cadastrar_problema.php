<?php
session_start();
$definicao = $_POST["definicao"];
$usuario_id = $_SESSION["id_user"];
echo $definicao." ".$usuario_id;
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
$insert = pg_query("INSERT INTO monitoria.problema(definicao,usuario_id) VALUES('$definicao','$usuario_id')");
$redirect = "http://69.60.115.37/~augustobw/listar_problemas.php";
header("location:$redirect");

pg_close($dbconn);
?>



