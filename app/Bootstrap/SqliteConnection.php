<?php

namespace App\Bootstrap;

use SQLite3;

class SqliteConnection extends SQLite3
{
    use dbConnectionTrait;

    //DB Path
    private $dbPath = 'sqlite:db.sqlite3';
    public $pdo = null;

    /**
     * SQLITE DB Connection
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $this->pdo = new \PDO($this->dbPath,'','', [\PDO::ATTR_PERSISTENT => true]);
            // Set errormode to exceptions
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            die ("Error! " . $th->getMessage());
        }

        // Create table messages
        $db = $this->pdo->prepare("CREATE TABLE IF NOT EXISTS savevalue
             (ID INTEGER PRIMARY KEY AUTOINCREMENT,
              valdata INTEGER NULL )");
        $db->execute();

    }

    /**
     * Undocumented function
     *
     * @param [type] $getDbVal
     * @return void
     */
    public function setDbconnection($getDbVal)
    {
        $this->pdo = $getDbVal;
    }

    /**
     * get Connection
     *
     * @return void
     */
    public function getnection()
    {
        return $this->pdo;
    }
}