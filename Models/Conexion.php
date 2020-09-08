<?php

class Conexion {
    
    public static function connection() {

        try {

            $con = new PDO("mysql:host=localhost;dbname=login_senasoft;charset=utf8", 'root', '');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $con;

        } catch (Exception $e) {
            die("Error en la base de datos " . $e->getMessage());
        }
    }
}