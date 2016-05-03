<?php
        $nome=$_POST["nome"];
        $telefone=$_POST["telefone"];
        $fase=$_POST["fase"];
        $idade=$_POST["idade"];
        $nomeresp=$_POST["nomeresp"];
        $dificuldade=$_POST["dificuldade"];
        $password=MD5($_POST["senha"]);

$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());
$verifica = pg_query("SELECT * FROM usuario_priscilabw WHERE nome='$nome' AND senha='$senha'") or die("Query Failed" . pg_last_error());
if (pg_num_rows($verifica)>0) {
        $redirect = "http://69.60.115.37/~priscilabw/sucesso.html";
        header("location:$redirect");
}
else{
        $redirect = "http://69.60.115.37/~priscilabw/erro.html";
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
                    die();
        header("location:$redirect");
}
pg_close($dbconn);
?>
