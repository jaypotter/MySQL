<?php

namespace Potter\MySQL\Connection;

trait MySQLInterfaceTrait
{
    final public function showDatabases(): array
    {
        return [];
    }

    final public function showTables(string $database): array
    {
        return [];
    }

}