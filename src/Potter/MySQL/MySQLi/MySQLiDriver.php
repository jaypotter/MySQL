<?php

declare(strict_types=1);

namespace Potter\MySQL\MySQLi;

use MySQLi;
use Potter\{Aware\AwareTrait, Name\NameTrait};
use Potter\Database\Driver\MySQL\AbstractMySQLDriver;
use Potter\Database\{Statement\StatementInterface, Result\ResultInterface};

final class MySQLiDriver extends AbstractMySQLDriver
{
    use AwareTrait, NameTrait;
    
    private function getMySQLi(object $handle): MySQLi
    {
        return $handle;
    }
    
    public function prepare(string $query, object $handle): StatementInterface
    {
        return new MySQLiStatement($query, $handle);
    }
    
    public function selectDatabase(object $handle): ResultInterface
    {
        $statement = $this->prepare('SELECT DATABASE();', $handle);
        $statement->execute();
        return $statement->getResult();
    }
    
    public function showDatabases(object $handle): ResultInterface
    {
        $statement = $this->prepare('SHOW DATABASES;', $handle);
        $statement->execute();
        return $statement->getResult();
    }
    
    public function use(string $database, object $handle): void
    {
        $statement = $this->prepare("USE $database;", $handle);
        $statement->execute();
    }
}
