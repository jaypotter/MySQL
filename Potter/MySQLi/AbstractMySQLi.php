<?php

namespace Potter\MySQLi;

use Potter\Abstraction\{
    AbstractionBaseClassTrait,
    AbstractionInterface,
    AbstractionTrait
};
use Potter\MySQL\Connection\AbstractMySQLConnection;
use \Exception;

abstract class AbstractMySQLi extends AbstractMySQLConnection implements MySQLiInterface
{
    use AbstractionTrait, AbstractionBaseClassTrait;

    final public function showDatabases(): array
    {
        return mysqli_query($this->getObject(), self::SHOW_DATABASES)->fetch_all(MYSQLI_ASSOC);
    }

    final public function showTablesIn(string $database): array
    {
        if (!$this->databaseExists($database)) {
            throw new Exception;
        }
        return mysqli_query($this->getObject(), self::SHOW_TABLES_IN . " $database;")->fetch_all(MYSQLI_ASSOC);
    }
}