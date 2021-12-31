<?php

namespace Potter\MySQL\Database;

use Potter\Database\Connection\DatabaseConnectionInterface;

trait MySQLDatabaseTrait
{
    private string $characterSet = MySQLDatabaseInterface::DEFAULT_CHARACTER_SET;
    private string $collation = MySQLDatabaseInterface::DEFAULT_COLLATION;

    final public function getCharacterSet(): string
    {
        return $this->characterSet;
    }

    final public function getCollation(): string
    {
        return $this->collation;
    }

    abstract public function getConnection(): DatabaseConnectionInterface;

    abstract public function getName(): string;

    final public function setCharacterSet(string $characterSet): void
    {
        $this->characterSet = $characterSet;
    }

    final public function setCollation(string $collation): void
    {
        $this->collation = $collation;
    }

    final public function showTables(): array
    {
        return $this->getConnection()->showTablesIn($this->getName());
    }
}