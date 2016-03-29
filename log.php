<?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    or die('Could not connect: ' . pg_last_error());

   $email = $_POST["email"];
   $pw = $_POST["pw"];
   session_start();
// Performing SQL query
$result = pg_query("SELECT * FROM usuario_mateusbw WHERE email='$email' AND password='$pw'") or die('Query failed: ' . pg_last_error());

$count = pg_num_rows($result);

if ($count == 1 && $email =="mateuscfc8@outlook.com"){
   $_SESSION['login'] = "l";
   echo 'manager.php';
}
else if ($count == 1){
    //header('Location: sucess.html');
    echo 'sucess.html';
} else {
    //header('Location: index.php');
    echo 'erro:Login ou senha incorretos';
}
// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>