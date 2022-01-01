<?php

namespace Potter\MySQL\Database;

use Potter\Database\{
    Connection\DatabaseConnectionInterface,
    Table\TableInterface
};
use Potter\MySQL\Connection\MySQLConnectionInterface;
use \Exception;

trait MySQLDatabaseTrait
{
    private string $characterSet = MySQLDatabaseInterface::DEFAULT_CHARACTER_SET;
    private string $collation = MySQLDatabaseInterface::DEFAULT_COLLATION;
    private bool $encrypted = MySQLDatabaseInterface::DEFAULT_ENCRYPTED;

    final public function createTable(string $table): void
    {

    }

    final public function getCharacterSet(): string
    {
        return $this->characterSet;
    }

    final public function getCollation(): string
    {
        return $this->collation;
    }

    final public function getTable(string $table): TableInterface
    {

    }

    public function isEncrypted(): bool
    {
        return $this->encrypted;
    }

    abstract public function getConnection(): DatabaseConnectionInterface;

    abstract public function getName(): string;

    final public function setCharacterSet(string $characterSet): void
    {
        /** @var MySQLConnectionInterface $conn */
        $conn = $this->getConnection();
        if (!$conn->characterSetExists($characterSet)) {
            throw new Exception;
        }
        $this->characterSet = $characterSet;
    }

    final public function setCollation(string $collation): void
    {
        $this->collation = $collation;
    }

    public function setEncrypted(): void
    {
        $this->encrypted = true;
    }

    public function setPlain(): void
    {
        $this->encrypted = false;
    }

    final public function showTables(): array
    {
        /** @var MySQLConnectionInterface $conn */
        $conn = $this->getConnection();
        return $conn->showTablesIn($this->getName());
    }
}