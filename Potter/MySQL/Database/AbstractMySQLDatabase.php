<?php

namespace Potter\MySQL\Database;

use Potter\Database\{
    AbstractDatabase,
    DatabaseTrait
};

abstract class AbstractMySQLDatabase extends AbstractDatabase implements MySQLDatabaseInterface
{
    use DatabaseTrait;
    
    abstract public function showTables(): array;
}