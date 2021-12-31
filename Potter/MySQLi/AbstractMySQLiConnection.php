<?php

namespace Potter\MySQLi;

use Potter\Abstraction\{
    AbstractionBaseClassTrait,
    AbstractionInterface,
    AbstractionTrait
};
use Potter\MySQL\Connection\AbstractMySQLConnection;

abstract class AbstractMySQLiConnection extends AbstractMySQLConnection implements MySQLiConnectionInterface
{
    use AbstractionTrait, AbstractionBaseClassTrait;
}