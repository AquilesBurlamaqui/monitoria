<?php
  class Result {
    public $output = "";
    public $message = "";
  }
  
  // Connecting, selecting database
  $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
  
  $result = new Result();
  $nameRegistered = $_POST["registerName"];
  $emailRegistered = $_POST["registerEmail"];  
  $passwordRegistered = MD5($_POST["registerPassword"]);
  $registerConfirmPassword = MD5($_POST["registerConfirmPassword"]);
  
  if($passwordRegistered != $registerConfirmPassword){
    $result->output = FALSE;  
    $result->message = "As senhas informadas precisam ser iguais!";
  }else{
    $isValid = pg_query("SELECT * FROM monitoria.usuario WHERE email='$emailRegistered'") or die("Query Failed" . pg_last_error());
    $counter = pg_num_rows($isValid); //Conta quantas linhas encontraram determinado email no banco de dados.
    
    if ($counter == 0) { //Caso a quantidade de linhas seja 0, ou seja, o email não estiver no banco
      try{
   	$insert = pg_query("INSERT INTO monitoria.usuario(nome, email, senha) VALUES('$nameRegistered','$emailRegistered', '$passwordRegistered')");
        $result->output = TRUE;
        $result->message = "Usuario criado com sucesso!";
      }catch(Exception $e){
        $result->output = FALSE;
        $result->message = $e->getMessage();
      }
    }else{
      $result->output = FALSE;
      $result->message = "Ja existe alguem cadastrado com esse email...";
    }
  }
  
  echo json_encode($result);
  pg_close($dbconn);
?>