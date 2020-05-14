<?php

declare(strict_types=1);

include_once '../adapterspackage/MySQLAdapter.php';
include_once '../modelpackage/User.php';

class UserDAO {
    private $user;
    private $db;

    public function __construct(User $user, MySQLAdapter $db) {
        $this->user = $user;
        $this->db = $db;
    }

    public function adapter(MySQLAdapter $db) {
        $this->db = $db;
    }

    public function user(User $user) {
        $this->user = $user;
    }

    public function updatePassword(string $passwd):bool {       
        $query = "UPDATE users SET password = '".$passwd."' WHERE id = ".$this->user->id();
        return $this->db->executeQuery($query);
    }
    
    public function updateStatus():bool {       
        $query = "UPDATE users SET level = ".$this->user->level().", points = ".$this->user->points()." WHERE id = ".$this->user->id();
        return $this->db->executeQuery($query);
    }
}
