<?php

class conexao
{
    private static $host = "localhost";
    private static $usuario = "root";
    private static $senha = "1234";
    private static $banco = "festival01";

    public static function conectar()
    {
        $conexao = new mysqli(
            self::$host,
            self::$usuario,
            self::$senha,
            self::$banco
        );

        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        return $conexao;
    }
}