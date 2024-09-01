<?php

declare(strict_types=1);

namespace Potter\MySQL\Driver;

use Potter\Database\Driver\DatabaseDriverInterface;
use Potter\Database\Result\ResultInterface;

interface MySQLDriverInterface extends DatabaseDriverInterface
{
    public function selectDatabase(object $handle): ResultInterface;
    public function showDatabases(object $handle): ResultInterface;
    public function use(string $database, object $handle): void;
}
