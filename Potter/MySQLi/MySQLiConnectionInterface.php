<?php

namespace Potter\MySQLi;

use Potter\{
    Abstraction\AbstractionInterface,
    MySQL\Connection\MySQLConnectionInterface
};

interface MySQLiConnectionInterface extends AbstractionInterface, MySQLConnectionInterface
{
    final public const DEFAULT_HOST = 'localhost';
    final public const DEFAULT_PASS = '';
    final public const DEFAULT_PORT = 3306;
    final public const DEFAULT_USER = 'root';
}