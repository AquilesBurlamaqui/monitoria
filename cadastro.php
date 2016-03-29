<!DOCTYPE html>
<html>
	<head>
		<title>
			Cadastro
		</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
                </script>
                <script type="text/javascript" src="js/scripts.js"></script>

	</head>
	<body>
		<h4>Cadastro Page</h4>
		<form id="formulario_cadastro" method="post">
			<table border="0">
			<tr>
				<td>nome</td>
				<td><input type="text" id="nome_usuario"></td>
			</tr>
			<tr>
				<td>
					email
				</td>
				<td>
					<input type="text" id="email_usuario">
				</td></tr>
			<tr>
				<td>
					password
				</td>
				<td>
					<input type="password" id="senha_usuario">
				</td>
			</tr>
			<tr align="right">
				<td colspan="2">
					<input id="bt_cadastrar" type="submit" value="cadastrar"/>
				</td>
			</tr>
			<tr align="right">
				<td colspan="2">
					<a href="cadastro">Cadastro</a>
				</td>
			</tr>
			</table>
		</form>
	</body>
</html>


