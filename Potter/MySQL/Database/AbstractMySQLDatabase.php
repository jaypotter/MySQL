<?php

namespace Potter\MySQL\Database;

use Potter\Database\{
    AbstractDatabase,
    DatabaseTrait
};

abstract class AbstractMySQLDatabase extends AbstractDatabase implements MySQLDatabaseInterface
{
    use DatabaseTrait;

    abstract public function getCharacterSet(): string;

    abstract public function getCollation(): string;

    abstract public function isEncrypted(): bool;

    abstract public function setCharacterSet(string $characterSet): void;

    abstract public function setCollation(string $collation): void;

    abstract public function setEncrypted(): void;

    abstract public function setPlain(): void;
    
    abstract public function showTables(): array;
}