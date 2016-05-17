
<!DOCTYPE html>
<html>
	<head>
		<title>Monitoria</title>
		<meta charset="utf-8">
	</head>
	<body>
	<?php
	   //Inicia a sessão
	   session_start();

	   if($_SESSION["login"]!=true) {
	      echo "<h1>Usuário não logado</h1>";

	      echo "<a href='index.php'>Logar</a>";
	   } else {
			?>
			<h1>Esta é a página do nosso sistema de monitoria</h1>
			<p>Bem vindo, <?php echo $_SESSION["nome"]?></p>
			<p>A Monitoria interliga monitores e alunos em busca de soluções para problemas</p>
			<a href="listar_usuarios.php">Listar Usuário</a>
			<a href="listar_problemas.php">Listar Problemas</a>
			<a href="form_problema.php">Cadastrar Problema</a>
			<a href="form_papel.php">Cadastrar Papel</a>
			<a href="listar_papeis.php">Listar Papeis</a>
			<a href="logout.php">Logout</a>
			<?php
	   }
	?>
	</body>
</html> 
