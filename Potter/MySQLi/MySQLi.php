<?php

namespace Potter\MySQLi;

final class MySQLi extends AbstractMySQLi
{
    use MySQLiTrait;
    
    private const PREFIX = 'mysqli';

    public function __construct(string $user = self::DEFAULT_USER, string $pass = self::DEFAULT_PASS, string $host = self::DEFAULT_HOST, string $port = self::DEFAULT_PORT)
    {
        $this->setHost($host);
        $this->setPass($pass);
        $this->setPort($port);
        $this->setUser($user);
        $this->setBaseClass(self::BASE_CLASS);
        $this->connect();
    }

    public function getPrefix(): string
    {
        return self::PREFIX;
    }
}