<?php
// Start the session
session_start();
?>
<?php
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
$verifica = pg_query("SELECT * FROM monitoria.usuario WHERE email='$email' AND senha='$senha'") or die("Query Failed" . pg_last_error());
if (pg_num_rows($verifica)>0) {
        $_SESSION["login"]=true;
	$_SESSION["email"]=$email;  
        
	while ($line = pg_fetch_row($verifica)) {
                $_SESSION["id_user"]=$line[0];
        	$_SESSION["nome"]=$line[1];
	} 
        $redirect = "http://69.60.115.37/~athos/monitoria/sucesso.php";
        header("location:$redirect");
}
else{
        $redirect = "http://69.60.115.37/~athos/monitoria/index.php";
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
                    die();
        header("location:$redirect");
}
pg_close($dbconn);
?>

