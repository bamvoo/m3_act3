<?php
declare(strict_types=1);

include_once '../adapterspackage/MySQLAdapter.php';
include_once 'LevelController.php';

class ActivityDAO
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

    public function selectLevelFibo()
    {
        $query = "select nivell from activities where nom = 'fibonacci'";
        $this->db->executeQuery($query);
        return $query;
    }
    public function selectLevelPrimo()
    {
        $query = "select nivell from activities where nom = 'primers'";
        $this->db->executeQuery($query);
        return $query;
    }


}