<?php

namespace Framework\Database\Interface;

use PDO;

interface DatabaseInterface
{
    public function getPdo() : PDO;
}
