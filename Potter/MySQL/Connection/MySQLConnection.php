<?php

namespace Potter\MySQL\Connection;

use Potter\Database\DatabaseInterface;

abstract class MySQLConnection extends AbstractMySQLConnection
{
    use MySQLConnectionTrait;

    private const PREFIX = 'mysql';

    public function getPrefix(): string
    {
        return self::PREFIX;
    }

    final public function getDatabase(string $database): DatabaseInterface
    {
        return new MySQLDatabase($this, $database);
    }
}