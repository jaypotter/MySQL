<?php

namespace Potter\MySQL\Connection;

use Potter\{
    Database\DatabaseInterface,
    MySQL\Database\MySQLDatabase
};

trait MySQLConnectionTrait
{
    private array $databases;

    final public function getDatabases(bool $refresh = false): array
    {
        if ($refresh||!isset($this->databases)) {
            $this->refreshDatabases();
        }
        return $this->databases;
    }

    final public function getTables(string $database): array
    {
        $tables = [];
        foreach($this->showTablesIn($database) as $table) {
            array_push($tables, array_values($table)[0]);
        }
        return $tables;
    }

    abstract public function showCharacterSet(): array;

    abstract public function showDatabases(): array;

    abstract public function showTablesIn(string $database): array;

    final public function refreshDatabases(): void
    {
        $databases = [];
        foreach($this->showDatabases() as $database) {
            array_push($databases, array_values($database)[0]);
        }
        $this->databases =  $databases;
    }
}