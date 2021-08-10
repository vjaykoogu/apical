<?php

namespace App\Bootstrap;

use App\Bootstrap\SqliteConnection;

class GetConnection
{
    public $dbConnection = null;

    /**
     * Undocumented function
     *
     * @param [type] $dbConnection
     * @return void
     */
    public function getDbConnection(SqliteConnection $dbConnection)
    {
        return $this->dbConnection = $dbConnection;
    }

    /**
     * get DB Connection function
     *
     * @return void
     */
    public function getConntor()
    {
        return $this->dbConnection;
    }
}