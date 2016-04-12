<?php
  class User {
    public $name = "";
    public $email = "";
    public $password = "";
  }
  
  $user = new User();
  
  $user->email = $_POST['loginEmail'];
  $user->password = MD5($_POST['loginPassword']);
  $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
  
  session_start();
  $_SESSION['email'] = $user->email;
  
  $result = pg_query("SELECT * FROM monitoria.usuario WHERE email='$user->email' AND senha='$user->password'") or die("Query Failed" . pg_last_error());
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