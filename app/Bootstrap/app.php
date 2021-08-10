<?php

use App\Bootstrap\GetConnection;
use App\Bootstrap\SqliteConnection;

/**
 * setup and fetching the connection
 */
$dbConnection = (new SqliteConnection());
$getConnection = new GetConnection();
$getConnection->getDbConnection($dbConnection);