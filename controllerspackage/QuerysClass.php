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
        $this->db->executeQuery($query, $data);
        return $query;
    }
    public function selectLevelPrimo(&$data2)
    {
        $query = "select nivell from activities where nom = 'primers'";
        $this->db->executeQuery($query, $data2);

        return $query;
    }

    public function insertLogros(int $punts, int $codi_user){


        $codi_act = "select codi from activities where nom = 'primers'";

        $query = "insert into results (codi_act, codi_user, punts) VALUES ('".$codi_act."','".$codi_user."','".$punts."')";
        $this->db->executeQuery($query, $data3);

        return $query;
    }

}