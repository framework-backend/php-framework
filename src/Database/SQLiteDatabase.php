<?php

namespace Framework\Database;

use Framework\Database\Interface\DatabaseInterface;
use PDO;

class SQLiteDatabase implements DatabaseInterface
{
    private PDO $pdo;

    public function __construct( string $filepath )
    {
        $this->pdo = new PDO( "sqlite:${filepath}" );
    }

    public function getPdo() : PDO
    {
        return $this->pdo;
    }
}
