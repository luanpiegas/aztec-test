<?php

class Database {
    private $host = "localhost:10021";
    private $username = 'root';
    private $password = 'root';
    private $database = "aztectest";
    private $connection;

    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        $result = $this->connection->query($sql);

        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }

        return $result;
    }

    public function close() {
        $this->connection->close();
    }
}