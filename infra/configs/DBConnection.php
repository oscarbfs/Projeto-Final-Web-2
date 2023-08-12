<?php
class DBConnection {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli('localhost:3306', 'root', '');

        $createDbQuery = "CREATE DATABASE IF NOT EXISTS farmnote";
        $this->connection->query($createDbQuery);
        $this->connection->select_db('farmnote');

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

?>