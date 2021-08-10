<?php

namespace App\Controllers;

use App\Bootstrap\SqliteConnection;
use MiladRahimi\PhpContainer\Container;
use Laminas\Diactoros\Response\JsonResponse;

/**
 * Undocumented class
 */
class RetrieveValueController
{
    private $data;

    /**
     * Main Add Method
     *
     * @return void
     */
    private function retrieveValue()
    {
        
        $table = <<<EOF
            SELECT * FROM savevalue
        EOF;
        $t = $database->query($table);

        //sucess in storing value into DB.
        $this->data = $t;
    }

    public function show()
    {
        $this->retrieveValue();

       return new JsonResponse(['value' => $this->data]);
    }
}