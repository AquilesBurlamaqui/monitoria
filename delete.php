<?php
   class Result {
    public $output = "";
    public $message = "";
  }
  
  $result = new Result();
  
  $user = $_POST["user"];
  
  
  $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
  
  try {
	$query = pg_query("DELETE FROM usuario_rodolfo WHERE email='$user'") or die("Query Failed" . pg_last_error());
	$result->output = TRUE;
	$result->message = "Your account was successfully deleted!";
  }catch(Exception $e){
    $result->output = FALSE;
    $result->message = $e->getMessage();
  }

  echo json_encode($result);
  pg_close($dbconn);
?>