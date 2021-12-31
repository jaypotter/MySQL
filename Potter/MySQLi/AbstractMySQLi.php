<?php

namespace Potter\MySQLi;

use Potter\Abstraction\{
    AbstractionBaseClassTrait,
    AbstractionInterface,
    AbstractionTrait
};
use Potter\MySQL\Connection\{
    AbstractMySQLConnection,
    MySQLInterfaceTrait
};

abstract class AbstractMySQLi extends AbstractMySQLConnection implements MySQLiInterface
{
    use AbstractionTrait, AbstractionBaseClassTrait;

    final public function showDatabases(): array
    {
        mysqli_query($this->getObject(), MySQLConnectionInterface::SHOW_DATABASES)->fetch_all(MYSQLI_ASSOC);
    }
}