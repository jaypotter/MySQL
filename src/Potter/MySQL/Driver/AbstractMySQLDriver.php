<?php

declare(strict_types=1);

namespace Potter\MySQL\Driver;

use Potter\Database\{
    Column\ColumnInterface,
    Driver\AbstractDatabaseDriver,
    Result\ResultInterface
};

abstract class AbstractMySQLDriver extends AbstractDatabaseDriver implements MySQLDriverInterface
{
    abstract public function createDatabase(object $handle, string $database, string $charset = self::DEFAULT_CHARSET, string $collation = self::DEFAULT_COLLATION): void;
    abstract public function dropDatabase(object $handle, string $database): void;
    abstract public function createTable(object $handle, string $table, ColumnInterface ...$columns): void;
    abstract public function dropTable(object $handle, string $database): void;
    abstract public function selectDatabase(object $handle): ResultInterface;
    abstract public function showDatabases(object $handle): ResultInterface;
    abstract public function showTables(object $handle): ResultInterface;
    abstract public function use(object $handle, string $database): void;
}
