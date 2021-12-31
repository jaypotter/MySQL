<?php

namespace Potter\MySQL\Connection;

use Potter\Connection\Database\Remote\RemoteDatabaseConnectionInterface;

interface MySQLConnectionInterface extends RemoteDatabaseConnectionInterface
{
    public function showDatabases(): array;
}