<?php

namespace Src\Models;

use PDO;

class Database
{

    private string $host = 'localhost';

    private string $username;

    private string $password;

    private string $database;
    private int $port = 3306;

    public function __construct(string $host, string $username, string $password, string $database, int $port){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
    }

    //throw try catch
    public function getConnection(): PDO {
        $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8;port={$this->port}";
        return new PDO($dsn, $this->username, $this->password);
    }
}
