<?php

abstract class Repository{
    protected $conec;

    public function __construct(){
        require_once __DIR__.'/../database_connection.php';
        $this->conec = (new Database())->getConnection();
    }
}
?>