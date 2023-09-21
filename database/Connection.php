<?php

namespace Database;

class Connection
{
    /**
     * объект PDO
     * @var \PDO
     */
    private $pdo;

    public function connect()
    {
        $dsn = "pgsql:host=localhost;port=5432;dbname=php_project_9;user=root;password=123";
        $pdo = new \PDO($dsn);
        $this->pdo = $pdo;

        return $pdo;
    }
}