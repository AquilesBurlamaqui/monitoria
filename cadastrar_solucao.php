<?php
session_start();
$descricao = $_POST["descricao"];
$usuario_id = $_SESSION["id_user"];
$problema_id = $_POST["problema_id"];
echo $descricao." ".$usuario_id;
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
$insert = pg_query("INSERT INTO monitoria.solucao(descricao,usuario_id, problema_id, avaliacao) VALUES('$descricao','$usuario_id','$problema_id', 0)");
$redirect = "http://69.60.115.37/~athos/monitoria/sucesso.php";
header("location:$redirect");

pg_close($dbconn);
?>



