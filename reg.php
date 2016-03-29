<?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    or die('Could not connect: ' . pg_last_error());

   $nome = $_POST["nome"];
   $email = $_POST["email"];
   $pw = $_POST["pw"];
// Performing SQL query
$result = pg_query("SELECT * FROM usuario_mateusbw WHERE email='$email'") or die('Query failed: ' . pg_last_error());

$count = pg_num_rows($result);

if ($nome == "") {
   echo 'erro:Nome invalido';
} else if ($pw == ""){
   echo 'erro:Senha invalida';
} else if ($count == 0){
    $insert = pg_query("INSERT INTO usuario_mateusbw(nome,email,password) VALUES('$nome','$email','$pw')");
    echo 'index.php';
} else {
    echo 'erro:Email existente';
}
// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>