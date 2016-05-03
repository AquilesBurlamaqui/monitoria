<!DOCTYPE html>
<html>
<head>
<title>Cadastro de Usuário</title>
<meta charset="utf-8">
</head>
<body>

<h1>Cadastro de Solucao</h1>
<form method="POST" action="cadastrar_solucao.php">
	  Descricao:</br>
	  <textarea name="descricao" rows="10" cols="30">
	  </textarea>
          <input type="hidden" name="problema_id" value="<?php echo $_GET["problema_id"]?>">      
          <input type="hidden" name="usuario_id" value="<?php echo $_GET["usuario_id"]?>">
	  <input type="submit" value="submit"/>
 </form>

</body>
</html>
