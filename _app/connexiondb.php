<?php
if (!function_exists("dbConnect")) {
    function dbConnect()
    {
        try {
            $user = $GLOBALS["db"]["username"];
            $pwd = $GLOBALS["db"]["password"];
            $dbname = $GLOBALS["db"]["name"];
            $host = $GLOBALS["db"]["host"];
            $dsn = "mysql:host=$host;dbname=$dbname";      
            $bdd = new PDO($dsn, $user, $pwd, 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;
    }
}