<?php
declare(strict_types=1);

include_once '../adapterspackage/MySQLAdapter.php';
include_once 'LevelController.php';

class QuerysClass
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

        $datauser2 = [];
        $db2 = DBConnectionFactory::getConnection();
        $query2 = "select codi from activities where nom = 'fibonacci'";
        $db2->executeQuery($query2, $datauser2);

        unset($_SESSION['actcodi']);
        $_SESSION['actcodi'] = $datauser2[0]['codi'];

        return $query;
    }
    public function selectLevelPrimo(&$data2)
    {
        $query = "select nivell from activities where nom = 'primers'";
        $this->db->executeQuery($query, $data2);

        $datauser3 = [];
        $db3 = DBConnectionFactory::getConnection();
        $query3 = "select codi from activities where nom = 'primers'";
        $db3->executeQuery($query3, $datauser3);

        unset($_SESSION['actcodi']);
        $_SESSION['actcodi'] = $datauser3[0]['codi'];

        return $query;
    }

//    public function insertLogros(int $punts, int $codi_user){
//
//
//        $codi_act = $_COOKIE['actcodi'];
//
//        $query = "insert into results (codi_act, codi_user, punts) VALUES ('".$codi_act."','".$codi_user."','".$punts."')";
//        $this->db->executeQuery($query, $data3);
//
//        return $query;
//    }

}