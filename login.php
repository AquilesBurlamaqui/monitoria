<?php
  class User {
    public $name = "";
    public $email = "";
  }
  
  $password = MD5($_POST['loginPassword']);
 
  $user = new User();
  $user->email = $_POST['loginEmail'];
  
  $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
  
  $result = pg_query("SELECT * FROM monitoria.usuario WHERE email='$user->email' AND senha='$password'") or die("Query Failed" . pg_last_error());
  if (pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);
    $user->name = $row["nome"];
    echo json_encode($user);
  }
  else{
    echo json_encode(NULL);
  }
  pg_close($dbconn);
?>