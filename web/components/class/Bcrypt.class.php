<?php

/**
 * @brief Classr Bcrypt
 *      é responsável por criptografar todos os dados passados.
 *
 */
abstract class Bcrypt {
    protected static $_saltPrefix = '2a';   /**< Prefixo padrao de Salt (padrao = '2a') */
    protected static $_defaultCost = 8;   /**< Custo padrao de Hash (4-31) (padrao = 8) */
    protected static $_saltLength = 22;   /**< Comprimento limite de Salt (padrao = 22) */

    /*
    Sequencia de hash.
     */
    protected static function hash($string, $cost = null) {
        if (empty($cost)) {
            $cost = self::$_defaultCost;
        }
        $salt = self::generateRandomSalt();
        $hashString = self::__generateHashString((int) $cost, $salt);

        return crypt($string, $hashString);
    }

/*
        Gera um randomico base 64 atribuindo a variavel salt.
*/
    protected static function generateRandomSalt() {
        // Salt seed
        $seed = uniqid(mt_rand(), true);

        // Generate salt
        $salt = base64_encode($seed);
        $salt = str_replace('+', '.', $salt);

        return substr($salt, 0, self::$_saltLength);
    }

/*
    cria um Hash do tipo String pra a funcao crypt.
*/
    private static function __generateHashString($cost, $salt) {
        return sprintf('$%s$%02d$%s$', self::$_saltPrefix, $cost, $salt);
    }
}
