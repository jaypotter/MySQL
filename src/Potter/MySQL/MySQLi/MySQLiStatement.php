<?php

declare(strict_types=1);

namespace Potter\MySQL\MySQLi;

use MySQLi, MySQLi_Stmt;
use Potter\Database\Statement\AbstractStatement;
use Potter\Database\Result\ResultInterface;

final class MySQLiStatement extends AbstractStatement
{   
    private MySQLi_Stmt $statement;
    
    public function __construct(private string $query, MySQLi $handle)
    {
        $this->statement = $handle->prepare($query);
    }
    
    public function __toString(): string
    {
        return $this->query;
    }
    
    public function execute(mixed ...$vars): void
    {
        $this->statement->execute($vars);
    }
    
    public function getResult(): ResultInterface
    {
        return new MySQLiResult($this->statement->get_result());
    }
}
