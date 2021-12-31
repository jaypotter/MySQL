<?php

namespace Potter\MySQL\Connection;

use Potter\{
    Database\DatabaseInterface,
    MySQL\Database\MySQLDatabase
};
use Potter\Database\Connection\{
    DatabaseConnectionTrait,
    Remote\AbstractRemoteDatabaseConnection
};

abstract class AbstractMySQLConnection extends AbstractRemoteDatabaseConnection implements MySQLConnectionInterface
{
    use DatabaseConnectionTrait, MySQLConnectionTrait;

    private const PREFIX = 'mysql';

    abstract public function characterSetExists(string $characterSet): bool;

    abstract public function getCharacterSet(): array;

    final public function getDatabase(string $database): DatabaseInterface
    {
        return new MySQLDatabase($this, $database);
    }

    public function getPrefix(): string
    {
        return self::PREFIX;
    }

    abstract public function showCharacterSet(): array;

    abstract public function showDatabases(): array;

    abstract public function showTablesIn(string $database): array;
}