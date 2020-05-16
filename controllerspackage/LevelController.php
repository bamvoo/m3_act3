<?php

include "ActivityDAO.php";
include "../adapterspackage/DBConnectionFactory.php";


function tablaActivity(&$data){

    $db=DBConnectionFactory::getConnection();

    $activity=new ActivityDAO($db);

    $activity->selectActivities($data);

    return $data;

}
function lvlFibo(&$data){

    $db=DBConnectionFactory::getConnection();

    $activity=new ActivityDAO($db);

    $activity->selectLevelFibo();

    return $data;

}
function lvlPrimo(&$data){

    $db=DBConnectionFactory::getConnection();

    $activity=new ActivityDAO($db);

    $activity->selectLevelPrimo();

    return $data;

}
