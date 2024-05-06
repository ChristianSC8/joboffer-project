<?php
class connection
{
    static public function infoDataBase()
    {
        $infoDB = array(
            "host" => "localhost",
            "port" => "3306",
            "database" => "job_offer",
            "user" => "root",
            "password" => ""
        );
        return $infoDB;
    }

    static function connect()
    {
        try {

            $databaseConfig = Connection::infoDataBase();
            $connectionDNS = "mysql:host={$databaseConfig['host']};port={$databaseConfig['port']};dbname={$databaseConfig['database']}";

            $connectionDB = new PDO(
                $connectionDNS,
                $databaseConfig['user'],
                $databaseConfig['password']
            );

            $connectionDB->exec("set names utf8");
        } catch (PDOException $e) {

            die("Error:" . $e->getMessage());
        }

        return $connectionDB;
    }
}
