<?php

declare(strict_types=1);

namespace Potter\MySQL\Driver;

use Potter\Database\Driver\DatabaseDriverInterface;
use Potter\Database\Result\ResultInterface;

interface MySQLDriverInterface extends DatabaseDriverInterface
{
    private const string CHARSET = 'utf8mb4';
    private const string COLLATION = 'utf8_unicode_ci';
    
    public function createDatabase(string $name, string $charset = self::CHARSET, string $collation = self::COLLATION): void;
    public function selectDatabase(object $handle): ResultInterface;
    public function showDatabases(object $handle): ResultInterface;
    public function use(string $database, object $handle): void;
}
