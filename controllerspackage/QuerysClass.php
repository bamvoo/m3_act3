<?php
declare(strict_types=1);

include_once '../adapterspackage/MySQLAdapter.php';
include_once 'LevelController.php';

class QuerysClass1
{

    public function __construct(MySQLAdapter $db) {
        $this->db = $db;
    }

    public function selectActivities(&$data)
    {

        $query = "SELECT * FROM activities";
        $this->db->executeQuery($query, $data);

        return $data;
    }

    public function selectLevelFibo(&$data)
    {
        $query = "select nivell from activities where nom = 'fibonacci'";
//        $this->db->executeQuery($query,
        $this->connection->query($query);
        return $query;
    }
    public function selectLevelPrimo(&$data2)
    {
        $query = "select nivell from activities where nom = 'primers'";
//        $this->db->executeQuery($query, $data2);
        $this->connection->query($query);

        return $query;
    }


}