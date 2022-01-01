<?php

namespace Potter\MySQLi;

use Potter\Abstraction\{
    AbstractionBaseClassTrait,
    AbstractionInterface,
    AbstractionTrait
};
use Potter\Database\DatabaseInterface;
use Potter\MySQL\Connection\{
    AbstractMySQLConnection,
    MySQLCharacterSetTrait
};
use Potter\MySQL\Database\MySQLDatabaseInterface;
use \Exception;

abstract class AbstractMySQLi extends AbstractMySQLConnection implements MySQLiInterface
{
    use AbstractionTrait, AbstractionBaseClassTrait, MySQLCharacterSetTrait;

    /** @var MySQLDatabaseInterface $database */
    final public function createDatabase(DatabaseInterface $database): void
    {       
        mysqli_query(
            mysql: $this->getObject(),
            query: self::CREATE_DATABASE . ' ' . $database->getName() .
                ' CHARACTER SET = ' . $database->getCharacterSet() .
                ' COLLATE = ' . $database->getCollation() .
                ' ENCRYPTION = \'' . ($database->isEncrypted() ? 'Y' : 'N') . '\';'
        );
    }

    final public function showCharacterSet(): array
    {
        return mysqli_query($this->getObject(), self::SHOW_CHARACTER_SET)->fetch_all(MYSQLI_ASSOC);
    }

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