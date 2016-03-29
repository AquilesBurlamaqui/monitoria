<?php

abstract class Connection {
    private static $hostname = 'localhost';  /**< Nome do host (padrao = 'localhost') */
    private static $username = 'root';       /**< Nome do usuario */
    private static $password = '';           /**< Senha do usuário */
    private static $dbname = '';     /**< Nome do banco de dados a ser utilizado */
    protected static $conn;                  /**< Armazena a conexão com o banco de dados */

/*
     Realiza a conexao.
*/
    private static function connect() {
        $conn = new mysqli(self::$hostname, self::$username, self::$password, self::$dbname);
        if ($conn->connect_error) {
            die("<hr> Connection failed: " . $conn->connect_error);
        }
        self::$conn = $conn;
    }

/*
    Executa a query SQL no banco de dados e retorna seu resultado.
*/
    protected static function execute($query) {
        if (empty(self::$conn) || !isset(self::$conn)) {
            Connection::connect();
        }
        $result = self::$conn->query($query);
        if (!$result) {
            echo "<hr> Error creating database: " . self::$conn->error;
        } else {
            return $result;
        }
    }

/*
    Fecha a conexão com o banco de dados.
 */
    public static function close() {
        mysqli_close(self::$conn);
    }
}