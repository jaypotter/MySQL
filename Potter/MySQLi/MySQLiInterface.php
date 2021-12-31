<?php

namespace Potter\MySQLi;

use Potter\{
    Abstraction\AbstractionInterface,
    MySQL\Connection\MySQLConnectionInterface
};

interface MySQLiInterface extends AbstractionInterface, MySQLConnectionInterface
{
    final public const BASE_CLASS = 'MySQLi';
    final public const DEFAULT_HOST = 'localhost';
    final public const DEFAULT_PASS = '';
    final public const DEFAULT_PORT = 3306;
    final public const DEFAULT_USER = 'root';
}