<?php

namespace Potter\MySQL\Connection;

use Potter\Connection\Database\{
    DatabaseConnectionTrait,
    Remote\AbstractRemoteDatabaseConnection
};

abstract class AbstractMySQLConnection extends AbstractRemoteDatabaseConnection implements MySQLConnectionInterface
{
    use DatabaseConnectionTrait, MySQLConnectionTrait;

    abstract public function showDatabases(): array;
}