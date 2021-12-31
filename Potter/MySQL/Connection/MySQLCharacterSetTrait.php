<?php

namespace Potter\MySQL\Connection;

trait MySQLCharacterSetTrait
{
    private array $characterSet;

    final public function getCharacterSet(): array
    {
        if (isset($this->characterSet)) {
            return $this->characterSet;
        }
        $characterSet = [];
        foreach($this->showCharacterSet() as $character) {
            array_push($characterSet, array_values($character)[0]);
        }
        return $this->characterSet = $characterSet;
    }

    abstract public function showCharacterSet(): array;
}