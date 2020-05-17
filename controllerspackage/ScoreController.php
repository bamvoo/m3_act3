<?php

include "QuerysClass.php";
include "../adapterspackage/DBConnectionFactory.php";


function upScore(int $points){

    $db=DBConnectionFactory::getConnection();

    $activity=new QuerysClass1($db);

    $activity->insertLogros($points);

    return 0;

}
