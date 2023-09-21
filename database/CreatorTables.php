<?php

namespace Database;

/**
 * Создание в PostgreSQL таблицы из демонстрации PHP
 */
class CreatorTables
{
    /**
     * объект PDO
     * @var \PDO
     */
    private $pdo;

    /**
     * инициализация объекта с объектом \PDO
     * @тип параметра $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * создание таблиц
     */
    public function createTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS users (
            id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
             name varchar(255),
             phone varchar(11),
             email varchar(255),
             password varchar(18)
        );';

        $this->pdo->exec($sql);

        return $this;
    }

}