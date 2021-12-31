<?php

namespace Potter\MySQL\Connection;

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

    abstract public function showDatabases(): array;

    final public function refreshDatabases(): void
    {
        $databases = [];
        foreach($this->showDatabases() as $database) {
            array_push($databases, array_values($database)[0]);
        }
        $this->databases =  $databases;
    }
}