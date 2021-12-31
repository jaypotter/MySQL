<?php

namespace Potter\MySQL\Connection;

use Potter\Database\Connection\Remote\RemoteDatabaseConnectionInterface;

interface MySQLConnectionInterface extends RemoteDatabaseConnectionInterface
{
    public const CREATE_DATABASE = "CREATE DATABASE";
    public const SHOW_CHARACTER_SET = "SHOW CHARACTER SET";
    public const SHOW_DATABASES = "SHOW DATABASES";
    public const SHOW_TABLES_IN = "SHOW TABLES IN";

    public function showCharacterSet(): array;

    public function showDatabases(): array;

    public function showTablesIn(string $database): array;
}