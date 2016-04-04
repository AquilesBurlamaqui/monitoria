<?php
        session_start();
        //verifica se tem algum usuario logado
        if(!isset($_SESSION['codigo_usuario']))
        {
                header("Location: index.php");
                //echo("nao logado");
        }

	include("conexao.php");

        //cria uma nova instancia da classe
        $conexao = new Conexao();

        $sql = "SELECT * FROM tb_usuario_jailsonbw WHERE codigo_usuario =" . $_SESSION['codigo_usuario'] . ";";
        $resultado = pg_query($conexao->abrirConexao(), $sql);

        $row = pg_fetch_array($resultado)
?>
<!DOCTYPE html>
<html lang="pt-br">
        <head>
                <title>
                        Monitoria
                </title>
                <meta charset="UTF-8"/>
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
                <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"> </script>
                <script type="text/javascript" src="js/scripts.js"></script>
                <script type="text/javascript" src="js/messages_pt_BR.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"/>
                <link rel="stylesheet" href="css/estilo.css" crossorigin="anonymous"/>
        </head>
        <body>
		<div class="login-page">
                        <div class="form">
                                <form class="login-form" method="post">
                                        <p align="right"><a href="#" id="sair">Sair</a></p>
					<p align="right"><a href="#" id="editar_perfil">#editarPerfil</a></p>
					<?php echo("<p id='nome_sessao'>Olá, <b>" . $_SESSION['nome'] . "</b></p>"); ?>
					<form class="register-form" method="post" id="formulario_atualizacao">
						<input id="nome_login_atualizar" hidden  type="text" <?php echo("placeholder=" . $row["nome"]); ?> />
						<input id="email_login_atualizar" hidden  type="text" <?php echo("placeholder=" . $row["email"]); ?> />
                                        	<input id="senha_login_atualizar" hidden type="password" placeholder="senha"/>
						<button type="button" id="bt_atualizar" hidden >ATUALIZAR</button>
					</form>
                                </form>
                        </div>
                </div>
        </body>
</html>
