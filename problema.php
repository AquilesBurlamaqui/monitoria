<?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    or die('Could not connect: ' . pg_last_error());

   session_start();
   $definicao = $_POST['def'];
   $email = $_SESSION['email'];
// Performing SQL query

$result = pg_query("SELECT * FROM monitoria.usuario WHERE email='$email'") or die('Query failed: ' . pg_last_error());
$row = pg_fetch_assoc($result);

$user_id = $row['id'];

$insert = pg_query("INSERT INTO monitoria.problema(definicao,usuario_id) VALUES('$definicao','$user_id')");

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

header('Location: index.html#home');
?>

