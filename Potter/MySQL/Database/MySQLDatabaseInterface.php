<?php

namespace Potter\MySQL\Database;

use Potter\Database\DatabaseInterface;

interface MySQLDatabaseInterface extends DatabaseInterface
{
    final public const DEFAULT_CHARACTER_SET = 'utf8mb4';
    final public const DEFAULT_COLLATION = 'utf8mb4_0900_ai_ci';
    final public const DEFAULT_ENCRYPTED = false;

    public function getCharacterSet(): string;

    public function getCollation(): string;

    public function isEncrypted(): bool;

    public function setCharacterSet(string $characterSet): void;

    public function setCollation(string $collation): void;

    public function setEncrypted(): void;

    public function setPlain(): void;

    public function showTables(): array;
}