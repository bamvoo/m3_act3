<?php

include "QuerysClass.php";
include "../adapterspackage/DBConnectionFactory.php";


function tablaActivity(&$data){

    $db=DBConnectionFactory::getConnection();

    $activity=new QuerysClass($db);

    $activity->selectActivities($data);

    return $data;

}
function lvlFibo(&$data){

    $db=DBConnectionFactory::getConnection();

    $activity=new QuerysClass($db);

    $activity->selectLevelFibo($data);

    return $data;

}
function lvlPrimo(&$data2){

    $db=DBConnectionFactory::getConnection();

    $activity=new QuerysClass($db);

    $activity->selectLevelPrimo($data2);

    return $data2;

}
