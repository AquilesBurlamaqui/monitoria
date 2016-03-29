<?php
require_once ('Bcrypt.class.php');

abstract class Criptography extends Bcrypt {


/*
    Criptografa a senha, retornando a string criptografada, sendo criptografia de apenas uma via.
 */
    public static function Bcrypt($password) {
        $hash = Bcrypt::hash($password);
        return $hash;
    }

/*
    Verifica se a senha confere com o hash guardado no banco de dados.
*/
    public static function CheckBcrypt($pass, $hash) {
        if (crypt($pass, $hash) === $hash) {
            return true;
        } else {
            return false;
        }
    }

    public static function BASE64($string, $status) {
        if ($status == '1') {
            $codificada = base64_encode($string);
            return $codificada;
        } else if ($status == '0') {
            $original = base64_decode($string);
            return $original;
        }
    }
}
