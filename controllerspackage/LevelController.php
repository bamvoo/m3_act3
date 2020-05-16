<?php

include "ActivityDAO.php";
include "../adapterspackage/DBConnectionFactory.php";


function tablaActivity(&$data){

    $db=DBConnectionFactory::getConnection();

    $activity=new ActivityDAO($db);

    $activity->selectActivities($data);

    return $data;

}
function lvlFibo(){

    $db=DBConnectionFactory::getConnection();

    $activity=new ActivityDAO($db);

    $data = $activity->selectLevelFibo();

    return $data;

}
function lvlPrimo(){

    $db=DBConnectionFactory::getConnection();

    $activity=new ActivityDAO($db);

    $data = $activity->selectLevelPrimo();

    return $data;

}
