<?php

namespace Potter\MySQL\Database;

use Potter\Database\AbstractDatabase;

abstract class AbstractMySQLDatabase extends AbstractDatabase implements MySQLDatabaseInterface
{
    abstract public function showTables(): array;
}