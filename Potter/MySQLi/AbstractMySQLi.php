<?php

namespace Potter\MySQLi;

use Potter\Abstraction\{
    AbstractionBaseClassTrait,
    AbstractionInterface,
    AbstractionTrait
};
use Potter\MySQL\Connection\AbstractMySQLConnection;

abstract class AbstractMySQLi extends AbstractMySQLConnection implements MySQLiInterface
{
    use AbstractionTrait, AbstractionBaseClassTrait;
}