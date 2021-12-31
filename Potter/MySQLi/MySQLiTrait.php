<?php

namespace Potter\MySQLi;

use \MySQLi_query;
use Potter\MySQLi\Native\NativeMySQLi;

trait MySQLiTrait
{
    final public function connect(): void
    {
        $this->setObject(
            new NativeMySQLi(
                hostname: $this->getHost(),
                username: $this->getUser(),
                password: $this->getPass(),
                port: $this->getPort()
            )
        );
    }

    abstract public function getHost(): string;

    abstract public function getPass(): string;

    abstract public function getPort(): int;

    abstract public function getUser(): string;

    final public function showDatabases(): array
    {
        mysqli_query($this->getObject(), self::SHOW_TABLES)->fetch_all(MYSQLI_ASSOC);
    }

    final public function showTables(string $database): array
    {

    }
}