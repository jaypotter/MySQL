<?php

namespace Potter\MySQL\Connection;

use Potter\Database\Connection\{
    DatabaseConnectionTrait,
    Remote\AbstractRemoteDatabaseConnection
};

abstract class AbstractMySQLConnection extends AbstractRemoteDatabaseConnection implements MySQLConnectionInterface
{
    use DatabaseConnectionTrait, MySQLConnectionTrait;

    abstract public function showDatabases(): array;

    abstract public function showTables(string $database): array;
}