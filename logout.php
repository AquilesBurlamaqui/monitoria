<?php
          session_start();
        //verifica se tem algum usuario logado
        if(!isset($_SESSION['nome']))
        {
                header("Location: index.php");
                //echo("nao logado");
        }
        //destroi a sesao corrente
        session_destroy();
        //remove todas as variaveis globais session
        session_unset();
        //imprimi na tela que o usuario saiu com sucesso do sistema
	header('Content-type: application/json');
        $response_array['status'] = 'success'; 
        echo json_encode($response_array);
?>
