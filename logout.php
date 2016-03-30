<?php
            //inicia a sessao
            session_start();
            //destroi a sesao corrente
            session_destroy();
            //remove todas as variaveis globais session
            session_unset();
            //imprimi na tela que o usuario saiu com sucesso do sistema
?>
