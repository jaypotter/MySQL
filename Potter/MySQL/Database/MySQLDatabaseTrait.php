<?php

namespace Potter\MySQL\Database;

use Potter\Database\Connection\DatabaseConnectionInterface;

trait MySQLDatabaseTrait
{
    abstract public function getConnection(): DatabaseConnectionInterface;

    abstract public function getName(): string;

    final public function showTables(): array
    {
        return $this->getConnection()->showTables($this->getName());
    }
}