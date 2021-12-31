<?php

namespace Potter\MySQL\Connection;

use Potter\Database\Connection\Remote\RemoteDatabaseConnectionInterface;

interface MySQLConnectionInterface extends RemoteDatabaseConnectionInterface
{
    public function showDatabases(): array;
}