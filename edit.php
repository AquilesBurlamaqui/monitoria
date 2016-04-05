<?php
  class Info {
    public $name = "";
    public $error = FALSE;
    public $errorMessage = "";
  }
  
  $info = new Info();
  
  $email = $_POST['registerEmail'];
  $info->name = $_POST['registerName'];
  
  $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
  
  try {
    $result = pg_query("UPDATE monitoria.usuario SET nome='$info->name' WHERE email='$email'") or die("Query Failed" . pg_last_error());
  }catch(Exception $e){
    $info->error = TRUE;
    $info->errorMessage = $e->getMessage();
  }
  
  echo json_encode($info);
  pg_close($dbconn);
?>