<?php
$email = $_POST['email'];
$senha = $_POST['senha'];
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
$verifica = pg_query("SELECT * FROM usuario_allanbw WHERE email='$email' AND senha='$senha'") or die("Query Failed" . pg_last_error());
if (pg_num_rows($verifica)>0) {
        $redirect = "http://69.60.115.37/~allanbw/login/sucessoVerdadeiro.php";
        header("location:$redirect");
}
else{
        $redirect = "http://69.60.115.37/~allanbw/login/login.php";
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
                    die();
        header("location:$redirect");
}
pg_close($dbconn);
?>
