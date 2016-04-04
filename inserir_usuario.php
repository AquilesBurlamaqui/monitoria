<?php
	session_start();

	include("conexao.php");

	$conexao = new Conexao();

	$nome = $_POST["post_nome"];
	$email = $_POST["post_email"];
	$senha = md5($_POST["post_senha"]);
	$codigo = $_POST["post_codigo"];

	if($codigo == 1)
	{
		$sql = "INSERT INTO public.tb_usuario_jailsonbw (nome, email, password) VALUES('" . $nome . "', '" . $email . "', '" . $senha . "');";
		pg_query($conexao->abrirConexao(), $sql);
	}
	else if($codigo == 2)
	{
		$sql = "UPDATE tb_usuario_jailsonbw SET nome='" . $nome . "', email='" . $email . "', password='" . $senha . "' WHERE codigo_usuario=" . $_SESSION['codigo_usuario'] . ";";
		pg_query($conexao->abrirConexao(), $sql);
		$_SESSION['nome'] = $nome;
	}

	$conexao->fecharConexao();

	header('Content-type: application/json');
    	$response_array['status'] = 'success'; 
	echo json_encode($response_array);
?>
