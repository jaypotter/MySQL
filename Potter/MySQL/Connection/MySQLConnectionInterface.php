<?php

namespace Potter\MySQL\Connection;

use Potter\Database\Connection\Remote\RemoteDatabaseConnectionInterface;

interface MySQLConnectionInterface extends RemoteDatabaseConnectionInterface
{
    public const SHOW_DATABASES = "SHOW DATABASES";
    public const SHOW_TABLES = "SHOW TABLES";

    public function showDatabases(): array;

    public function showTables(string $database): array;
}