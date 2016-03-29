<?php
  class Info {
    public $name = "";
    public $location = "";
    public $about = "";
    public $error = FALSE;
    public $errorMessage = "";
  }
  
  $info = new Info();
  
  $email = $_POST['registerEmail'];
  $info->name = $_POST['registerName'];
  $info->location = $_POST["registerState"] . ", " . $_POST["registerCountry"] . ".";
  $info->about = $_POST['registerAbout'];
  
  $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
  
  try {
    $result = pg_query("UPDATE usuario_rodolfo SET name='$info->name', location='$info->location', about='$info->about' WHERE email='$email'") or die("Query Failed" . pg_last_error());
  }catch(Exception $e){
    $info->error = TRUE;
    $info->errorMessage = $e->getMessage();
  }
  
  echo json_encode($info);
  pg_close($dbconn);
?>