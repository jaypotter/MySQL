<?php

namespace Potter\MySQL\Database;

use Potter\MySQL\Connection\MySQLConnectionInterface;

final class MySQLDatabase extends AbstractMySQLDatabase
{
    use MySQLDatabaseTrait;

    public function __construct(MySQLConnectionInterface $connection, string $database)
    {
        $this->setConnection($connection);
        $this->setName($database);
    }
}