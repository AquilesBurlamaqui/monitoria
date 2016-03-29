<?php
        //conexao com banco de dados
        $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016") or die('Could not connect: ' . pg_last_error());

        //$json = json_decode($_POST['dadosFormulario'], true);

        $login = $_POST["l"];
        $senha = md5($_POST["s"]);
        
        $sql = "SELECT * FROM usuario_allanbw WHERE email = '$login' AND senha = '$senha';";
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
