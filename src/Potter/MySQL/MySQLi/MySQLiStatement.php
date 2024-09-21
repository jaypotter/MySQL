<?php

declare(strict_types=1);

namespace Potter\MySQL\MySQLi;

use MySQLi, MySQLi_Stmt;
use Potter\Database\{
    Statement\AbstractStatement,
    Result\ResultInterface
};

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
    
    public function execute(array $vars = []): void
    {
        
        if (empty($vars)) {
            $this->statement->execute();
            return;
        }
        $types = '';
        foreach ($vars as $var) {
            $types .= is_int($var) ? 'i' : 's';
        }
        $varA = array_shift($vars);
        if (count($vars) === 0) {
            $this->statement->bind_param($types, $varA);
        } else {
            $this->statement->bind_param($types, $varA, ...$vars);
        }
        $this->statement->execute();
    }
    
    public function getResult(): ResultInterface
    {
        return new MySQLiResult($this->statement->get_result());
    }
}
