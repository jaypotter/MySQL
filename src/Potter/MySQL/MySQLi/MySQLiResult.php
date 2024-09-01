<?php

declare(strict_types=1);

namespace Potter\MySQL\MySQLi;

use \MySQLi_Result;
use Potter\Database\Result\AbstractResult;
use Potter\ArrayAccess\Numbered\NumberedArrayTrait;

final class MySQLiResult extends AbstractResult
{
    use NumberedArrayTrait;
    
    private array $result;
    
    public function __construct(MySQLi_Result $result)
    {
        $this->result = $result->fetch_all(\MYSQLI_ASSOC);
    }
    
    public function getLength(): int
    {
        return count($this->result);
    }
    
    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->result);
    }
    
    public function offsetGet(mixed $offset): mixed
    {
        return $this->result[$offset];
    }
    
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->result[$offset] = $value;
    }
    
    public function offsetUnset(mixed $offset): void
    {
        unset($this->result[$offset]);
    }
    
    public function toArray(): array 
    {
        return $this->result;
    }
}
