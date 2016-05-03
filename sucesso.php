<?php
   // Start the session
   session_start();
   if($_SESSION["login"]!=true) 
      echo "Usuário não logado";
   else {

?>
<!DOCTYPE html>
<html>
<head>
<title>Monitoria</title>
<meta charset="utf-8">
</head>
<body>

<h1>Esta é a página do nosso sistema de monitoria</h1>
<p>Bem vindo, <?php echo $_SESSION["nome"]?></p>
<p>A Monitoria interliga monitores e alunos em busca de soluções para problemas</p>
<a href="listar_usuarios.php">Listar Usuário</a>
<a href="listar_problemas.php">Listar Problemas</a>
<a href="form_problema.php">Cadastrar Problema</a>
<a href="logout.php">Logout</a>



</body>
</html> 

<?php
  }
?>
