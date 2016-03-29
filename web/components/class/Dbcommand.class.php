<?php
require_once ('Connection.class.php');

abstract class Dbcommand extends Connection {

/*
     Seleciona todo o Banco de dados de acordo com as colunas e valores passados.
     Caso queira selecionar tudo, passa-se tudo como parâmetro, assim como demais complementos, retornando um array pronto pra ser separado
*/
    public static function select($table, $where, $more = '') {
        if ('ALL' === $where || array('ALL') === $where) {
            $sql = "SELECT * FROM $table";
        } else {
            $sql = "SELECT * FROM $table WHERE";

            foreach ($where as $column => $value) {
                $sql .= " AND $column = '$value'";
            }

            $sql = preg_replace("/AND/", "", $sql, 1); // Retira o primeiro AND
        }

        $sql .= " " . $more;

        return Dbcommand::execute($sql);
    }

/*
    Insere no Banco de dados.
*/
    public static function insert($table, $column, $value) {
        if (count($value) === count($column)) {
            $sql = "INSERT INTO $table ($column[0]";

            for ($i = 1; $i < count($column); $i++) {
                $sql = $sql . ", $column[$i]";
            }

            $sql = $sql . ") VALUES ('$value[0]'";

            for ($i = 1; $i < count($column); $i++) {
                $sql = $sql . ", '$value[$i]'";
            }

            $sql = $sql . ")";
        }

        return Dbcommand::execute($sql);
    }

/*
     Atualiza os valores no Banco de dados, precisando dos novos valores e de um condicional para especifica quais linhas serão atualizadas.
*/
    public static function update($table, $data, $where) { //where = ''
        $sql = "UPDATE $table SET";

        foreach ($data as $column => $value) {
            $sql .= " $column = '$value',";
        }

        $sql = substr_replace($sql, '', -1); // Retira a ultima virgula

        $sql .= " WHERE"; // Pode colocar uma condicao pra adicionar where se tiver passado, pois assim dá erro caso nao tenha where, porem previne erros

        foreach ($where as $column => $value) {
            $sql .= " AND $column = '$value'";
        }

        $sql = preg_replace("/AND/", "", $sql, 1); // Retira o primeiro AND

        return Dbcommand::execute($sql);
    }

/*
     Deleta o pedido do banco de dados.
*/
    public static function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE";
        foreach ($where as $column => $value) {
            $sql .= " AND $column = '$value'";
        }
        $sql = preg_replace("/AND/", "", $sql, 1); // Retira o primeiro AND

        return Dbcommand::execute($sql);
    }

/*
    Limpa a string passada de injection, ou seja, barra todos os acentos.
*/
    private static function anti_injection($sql) {
        $mysqli = self::$conn;
        $sql2 = $mysqli->real_escape_string($sql);

        return $sql2;
    }

/*
    Trata os dados passado pelo POST daquele campo retornando uma string anti SQL injection.
*/
    public static function post($name) {
        $name = @$_POST[$name];
        $name = Dbcommand::anti_injection($name);

        return $name;
    }

/*
    Retorna os dados passado pelo GET daquele campo.
*/
    public static function get($name) {
        $name = @$_GET[$name];
        return $name;
    }

/*
    Quebra a string retornada do banco em um array.
*/
    public static function rows($result) {
        $row = $result->fetch_assoc();

        return $row;
    }

/*
    Quebra a string retornada do banco em um array.
*/
    public static function arrays($result) {
        $array = $result->fetch_array();
        return $array;
    }

/*
    Retorna a quantidades de elementos no array.
*/
    public static function count_rows($result) {
        $number = $result->num_rows;
        return $number;
    }

/*
    Retorna a url do servidor que se encontra o site jumtamente com o diretório setado manualmente na propria funcao.
*/
    public static function getServer(){
        $path = "/public_html"; // Diretorio da index
        $server = "http://" . $_SERVER['HTTP_HOST'] . $path;
        return $server;
    }

/*
    Retorna o titulo da página de acordo com a pasta do servidor que se encontra o arquivo.
*/
    public static function getTitle(){
        $url = explode("\\",getcwd());
        $path = $url[count($url) - 1];
        $title = ($path == "web") ? "gerenciamento" : $path;
        $title = ($title == "servicos") ? str_replace('c', 'ç', $title) : $title;
        return $title;
    }
}