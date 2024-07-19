<?php

declare(strict_types=1);

class DB
{
    protected $pdo;
    public function __construct () {
        return $this->pdo = new PDO('mysql:host=localhost;dbname=todo_app', 'root', '1234');
    }
}