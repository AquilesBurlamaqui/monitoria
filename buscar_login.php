<?php
	//comecando a sessao
        session_start();

	//inclue o arquivo para conexao
        include("conexao.php");

	//cria uma nova instancia da classe
        $conexao = new Conexao();

	//conexao com banco de dados
        $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());

        //$json = json_decode($_POST['dadosFormulario'], true);

        $login = $_POST["l"];
        $senha = md5($_POST["s"]);

	//sessao para login
        $_SESSION['login'] = $login;
	//sessao para senha
        $_SESSION['senha'] = $senha;

        $sql = "SELECT * FROM tb_usuario_jailsonbw WHERE email = '$login' AND password = '$senha';";
        $resultado = pg_query($dbconn, $sql);
	$rows = pg_num_rows($resultado);
        pg_close($conexao);

        header('Content-type: application/json');

        if($rows > 0)
	{
		$response_array['status'] = 'success';
	}
	else
	{
		$response_array['status'] = 'error';
	}

        echo json_encode($response_array);
?>
