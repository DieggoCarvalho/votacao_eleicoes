<?php

define("SERVERNAME","localhost");
define("DATABASE","eleicoes");
define("USERNAME","root");
define("PASSAWORD","root");

class ConexaoDB
{
    private static $conn;

    public static function getConn(){
        if(!isset(self::$conn)){
            try {
                self::$conn = new 
PDO("mysql:host=localhost:3309;dbname=eleicoes;charset=utf8", "root", "root");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Falha na conexão: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}

?>