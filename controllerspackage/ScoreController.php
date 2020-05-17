<?php

include "QuerysClass.php";
include "../adapterspackage/DBConnectionFactory.php";


function upScore(&$data3){

    $db=DBConnectionFactory::getConnection();

    $activity=new QuerysClass1($db);

    $activity->insertLogros($data3);

    return $data3;

}
