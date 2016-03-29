<?php
$email = $_POST['email'];
$password = MD5($_POST['password']);
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
$verifica = pg_query("SELECT * FROM usuario_arthurbw WHERE email='$email' AND password='$password'") or die("Query Failed" . pg_last_error());
if (pg_num_rows($verifica)>0) {
        $redirect = "http://69.60.115.37/~arthurbw/sucesso.html";
        header("location:$redirect");
}
else{
        $redirect = "http://69.60.115.37/~arthurbw/index.html";
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
                    die();
        header("location:$redirect");
}
pg_close($dbconn);
?>



