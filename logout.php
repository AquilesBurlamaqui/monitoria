<?php
   session_start();
   $_SESSION["login"]=false;
   $redirect = "http://69.60.115.37/~allanbw/login/monitoria";
   header("location:$redirect");
?>
