<?php

class database {
    private $_servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "db_dentiste";

    private $db;

    public function __construct()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=db_dentiste;charset=utf8','root','root');
        }
        catch(PDOException $ex) {
            echo "did not connect...";
        }
        return $db;
    }

    public function requete($requete) {
        try {
            echo 'req :'.$requete;
            return $this->db->prepare($requete);
        } catch(PDOException $ex) {
            echo $ex->getMessage();
        }
        return null;
    }

    public function fetch($result) {
        return null;
    }
}



?>
