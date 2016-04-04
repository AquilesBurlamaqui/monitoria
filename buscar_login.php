<?php
	//comecando a sessao
        session_start();

	//inclue o arquivo para conexao
        include("conexao.php");

	//cria uma nova instancia da classe
        $conexao = new Conexao();

        //$json = json_decode($_POST['dadosFormulario'], true);

        $nome = $_POST["post_nome"];
        $senha = md5($_POST["post_senha"]);

        $sql = "SELECT * FROM tb_usuario_jailsonbw WHERE nome = '$nome' AND password = '$senha';";

	$resultado = pg_query($conexao->abrirConexao(), $sql);
	$linha = pg_num_rows($resultado);
	$row = pg_fetch_array($resultado);

	$conexao->fecharConexao();

        header('Content-type: application/json');

        if($linha > 0)
	{
		//sessao para login
	        $_SESSION['nome'] = $nome;
		$_SESSION['codigo_usuario'] = $row["codigo_usuario"];
		$response_array['status'] = 'success';
	}
	else
	{
		$response_array['status'] = 'error';
	}

        echo json_encode($response_array);
?>
