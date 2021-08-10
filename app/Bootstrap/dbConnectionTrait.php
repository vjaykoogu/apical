<?php

namespace App\Bootstrap;

use App\Bootstrap\SqliteConnection;
use MiladRahimi\PhpContainer\Container;

/**
 * dbConnection
 */
trait dbConnectionTrait
{
    public $database = null;
    public $db = null;
    
    public function getDbConnection()
    {
        $container = new Container();
        $this->database = $container->get(SqliteConnection::class);

        return $this->database;
    }

    /**
     * Undocumented function
     *
     * @param [type] $getDbVal
     * @return void
     */
    public function setDbconnection($getDbVal)
    {
        return $this->db = $getDbVal;
    }

    /**
     * 
     */
    public function getDbConnector()
    {
        return $this->db;
    }
}
