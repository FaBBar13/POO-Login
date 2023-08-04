<?php

abstract class ConnectBdd
{


    public function connexion()
    {
        static $conn;
        if ($conn) {
            return $conn;
        }
        $servername = 'localhost';
        $username = 'root';


        try {
            $conn = new PDO("mysql:host=$servername;dbname=test_fab", $username);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            throw new ErrorException("Horreur : " . $e->getMessage());
        }

    }


    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

}