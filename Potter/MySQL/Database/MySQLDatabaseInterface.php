<?php

namespace Potter\MySQL\Database;

use Potter\Database\DatabaseInterface;

interface MySQLDatabaseInterface extends DatabaseInterface
{
    public function showTables(): array;
}