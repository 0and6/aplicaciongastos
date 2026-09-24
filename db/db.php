<?php


class Conectar {
    public static function conexion($server, $dbname, $user, $password) {
        try {
            $con = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>