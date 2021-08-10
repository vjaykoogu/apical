<?php

namespace App\Controllers;

use App\Bootstrap\GetConnection;

abstract class abstractController extends GetConnection
{
    protected $num1;
    protected $num2;

    public $conn = null;

    /**
     * Undocumented function
     */
    public function __construct()
    {
        $data = json_decode(file_get_contents('php://input'));

        $this->num1 = $data->num1;
        $this->num2 = !empty($data->num2) ? $data->num2 : null;
    }

    abstract public function show();

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getConn()
    {
        return $this->getConn = $this->getConntor();
    }
}