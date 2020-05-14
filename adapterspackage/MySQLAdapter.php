<?php

declare(strict_types=1);

class MySQLAdapter {

    protected $host;
    protected $port;
    protected $user;
    protected $password;
    protected $db;
    protected $connection = null;

    public function __construct(string $url, int $port, string $user, string $password, string $db) {
        $this->host = $url;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    public function __destruct() {
        $this->closeConnection();
    }

    public function connect(): string {
        if ($this->connection == null) {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db, $this->port);
        }
        if ($this->connection->connect_error) {
            return "Fail: " . $this->connection->connect_error;
        }
        return "done";
    }

    public function closeConnection() {
        if ($this->connection != null) {
            $this->connection->close();
            $this->connection = null;
        }
    }

    public function executeQuery(string $query, array &$dataset = null): bool {
        if ($this->connection == null and strcmp($this->connect(), "done") != 0) {
            return false;
        }        
        if (strcmp(strtoupper(substr($query, 0, 6)), "SELECT") == 0) {
            $result = $this->connection->query($query);
            if ($result != false) {
                $dataset = $this->adaptResults($result);
                return true;
            } else {
                return false;
            }
        } else {
            return $this->connection->query($query);
        }
    }

    private function adaptResults($results) {
        $result = [];
        while ($row = $results->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

}
