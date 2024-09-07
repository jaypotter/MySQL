<?php

declare(strict_types=1);

namespace Potter\MySQL\Driver;

use Potter\Database\{
    Column\ColumnInterface,
    Driver\DatabaseDriverInterface,
    Result\ResultInterface
};

interface MySQLDriverInterface extends DatabaseDriverInterface
{
    public const string DEFAULT_CHARSET = 'utf8mb4';
    public const string DEFAULT_COLLATION = 'utf8mb4_unicode_ci';
    
    public function createDatabase(object $handle, string $database, string $charset = self::DEFAULT_CHARSET, string $collation = self::DEFAULT_COLLATION): void;
    public function dropDatabase(object $handle, string $database): void;
    public function createTable(object $handle, string $table, ColumnInterface ...$columns): void;
    public function dropTable(object $handle, string $database): void;
    public function insert(object $handle, string $table, array $values): void;
    public function selectDatabase(object $handle): ResultInterface;
    public function showDatabases(object $handle): ResultInterface;
    public function showTables(object $handle): ResultInterface;
    public function use(object $handle, string $database): void;
}
