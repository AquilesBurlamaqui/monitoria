<?php
   session_start();
   $_SESSION["login"]=false;
   $redirect = "http://69.60.115.37/~athos/monitoria";
   header("location:$redirect");
?>
