<?php

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct() {
        
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "gaelfelix_distorsion";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
        
        $user = "gaelfelix";
        $password = "5a16f635a8837f52a7e3744f30344409";
        
        $this->db = new PDO(
            $connexionString,
            $user,
            $password
        );
    }

    private function getDatabaseInfo() : array
    {
        $handle = fopen("config/database.txt", "r");
        $lineNbr = 0;
        $info = [];

        if ($handle) {

            while (($line = fgets($handle)) !== false) {

                if($lineNbr === 0)
                {
                    $info["user"] = trim($line);
                }
                else if($lineNbr === 1)
                {
                    $info["password"] = trim($line);
                }
                else if($lineNbr === 2)
                {
                    $info["host"] = trim($line);
                }
                else if($lineNbr === 3)
                {
                    $info["db_name"] = trim($line);
                }

                $lineNbr++;
            }

            fclose($handle);
        }

        return $info;
    }
}