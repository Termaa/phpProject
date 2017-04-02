<?php

class DBConnec {

    private static $inst = null;
    private $pdo;

    private function __construct() {
        try
        {
            // Conection to the database
            $dsn = 'mysql:host=localhost;dbname=db_organizer';
            $this->pdo = new PDO($dsn, 'root', 'headshot2');
            $this->pdo->exec('SET CHARACTER SET utf8');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            // Diplaying errors
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }

    public static function getConnec() {
        if(is_null(self::$inst)) {
            self::$inst = new DBConnec();
        }
        return self::$inst;
    }
	
    	
}
