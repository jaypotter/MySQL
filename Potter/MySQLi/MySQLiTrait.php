<?php

namespace Potter\MySQLi;

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

    final public function showTables(string $database): array
    {

    }
}