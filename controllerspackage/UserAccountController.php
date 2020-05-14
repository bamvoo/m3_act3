<?php

declare(strict_types=1);

include_once '../adapterspackage/DBConnectionFactory.php';
include_once 'UserDAO.php';
include_once '../modelpackage/User.php';

function changePassword(string $passwd): bool {
    $dbconnection = DBConnectionFactory::getConnection();
    if ($dbconnection != null) {
        $user = new User( (int)filter_input(INPUT_COOKIE, 'userid'),filter_input(INPUT_COOKIE, 'username') );        
        $dbuser = new UserDAO($user, $dbconnection);
        return $dbuser->updatePassword($passwd);
    }
    return false;
}
