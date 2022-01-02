<?php

namespace Potter\MySQL\Connection;

use Potter\{
    Database\DatabaseInterface,
    MySQL\Database\MySQLDatabase
};
use Potter\Database\Connection\{
    DatabaseConnectionTrait,
    Remote\RemoteDatabaseConnection
};

abstract class AbstractMySQLConnection extends RemoteDatabaseConnection implements MySQLConnectionInterface
{
    abstract public function characterSetExists(string $characterSet): bool;

    abstract public function getCharacterSet(): array;

    abstract public function showCharacterSet(): array;

    abstract public function showDatabases(): array;

    abstract public function showTablesIn(string $database): array;
}