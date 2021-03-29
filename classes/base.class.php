<?php
    class Base {
        private $host= "localhost";
        private $user="root";
        private $pwd= "";
        private $dbName="timesell";

    protected function connect(){
        $dsn = 'mysql:host='.$this->host. ';dbname='.$this->dbName;
        $driver_options = 
            [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ];
        $pdo = new PDO($dsn,$this->user,$this->pwd,$driver_options);
        return $pdo;
    }
}
?>