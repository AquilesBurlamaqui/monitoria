<?php

  //Function to check if the request is an AJAX request 
  
  class User {
    public $name = "";
    public $email = "";
    public $password = "";
    public $location = "";
    public $about = "";
  }
  
  $user = new User();
  
  $user->email = $_POST['loginEmail'];
  $user->password = MD5($_POST['loginPassword']);
  $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
  
  $result = pg_query("SELECT * FROM usuario_rodolfo WHERE email='$user->email' AND password='$user->password'") or die("Query Failed" . pg_last_error());
  if (pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);
    $user->name = $row["name"];
    $user->location = $row["location"];
    $user->about = $row["about"];
    echo json_encode($user);
  }
  else{
    echo json_encode(NULL);
  }
  pg_close($dbconn);
?>