<?php

declare(strict_types=1);

namespace Potter\MySQL\MySQLi;

use MySQLi;
use Potter\{
    Aware\AwareTrait,
    MySQL\Driver\AbstractMySQLDriver,
    Name\NameTrait
};
use Potter\Database\{
    Column\ColumnInterface, 
    Result\ResultInterface,
    Statement\StatementInterface
};

final class MySQLiDriver extends AbstractMySQLDriver
{
    use AwareTrait, NameTrait;
    
    private function getMySQLi(object $handle): MySQLi
    {
        return $handle;
    }
    
    public function prepare(string $query, object $handle): StatementInterface
    {
        echo $query . PHP_EOL;
        return new MySQLiStatement($query, $handle);
    }
    
    public function createDatabase(object $handle, string $database, string $charset = self::DEFAULT_CHARSET, string $collation = self::DEFAULT_COLLATION): void
    {
        $this->validateNewDatabase($database, $charset, $collation);
        ($this->prepare("CREATE DATABASE $database " .
            "DEFAULT CHARACTER SET = '$charset' " .
            "DEFAULT COLLATE = '$collation';", $handle))->execute();
    }
    
    private function validateNewDatabase(string $database, string $charset, string $collation): void
    {
        if (!ctype_alnum(str_replace('_', '', $database . $charset . $collation))) {
            throw new \Exception;
        }
    }
    
    public function createTable(object $handle, string $table, ColumnInterface ...$columns): void
    {
        $this->validateNewTable($table, ...$columns);
        ($this->prepare("CREATE TABLE $table (" .
            $this->getCreateTableColumnText(...$columns) . 
            $this->getCreateTableConstraintText(...$columns) . 
            ");", $handle))->execute();
    }
    
    private function getCreateTableColumnText(ColumnInterface ...$columns): string
    {
        $columnText = '';
        $nColumns = count($columns);
        $iColumn = 1;
        foreach ($columns as $column) {
            $columnText .= $column->getName() . ' ' . $column->getColumnType();
            if (!($column->hasNullable() || !$column->hasPrimaryKey())) {
                $columnText .= ' NOT NULL';
            }
            if ($iColumn < $nColumns) {
                $columnText .= ', ';
            }
            $iColumn++;
        }
        return $columnText;
    }
    
    private function getCreateTableConstraintText(ColumnInterface ...$columns): string
    {
        $constraintText = '';
        foreach ($columns as $column) {
            if ($column->hasPrimaryKey()) {
                $constraintText .= ', PRIMARY KEY (' . $column->getName() . ')';
                continue;
            }
            if ($column->hasUniqueConstraint()) {
                $constraintText .= ', UNIQUE (' . $column->getName() . ')';
            }
        }
        return $constraintText;
    }
    
    private function validateNewTable(string $table, ColumnInterface ...$columns): void
    {
        if (!ctype_alnum(str_replace('_', '', $table))) {
            throw new \Exception;
        }
        foreach ($columns as $column) {
            $this->validateColumn($column);
        }
    }
    
    private function validateColumn(ColumnInterface $column): void
    {
        if (!ctype_alnum(str_replace('_', '', $column->getName()))) {
            throw new \Exception;
        }
        if (!ctype_alnum(str_replace(['_', '(', ')', ' '], '', $column->getColumnType()))) {
            throw new \Exception;
        }
    }
    
    public function dropDatabase(object $handle, string $database): void
    {
        ($this->prepare("DROP DATABASE $database;", $handle))->execute();
    }
    
    public function dropTable(object $handle, string $table): void
    {
        ($this->prepare("DROP TABLE $table;", $handle))->execute();
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
    
    public function showTables(object $handle): ResultInterface
    {
        $statement = $this->prepare('SHOW TABLES;', $handle);
        $statement->execute();
        return $statement->getResult();
    }
    
    public function use(object $handle, string $database): void
    {
        ($this->prepare("USE $database;", $handle))->execute();
    }
}
