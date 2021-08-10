<?php

namespace App\Controllers;

use App\Controllers\AbstractController;
use Laminas\Diactoros\Response\JsonResponse;


/**
 * Undocumented class
 */
class SaveValueController extends AbstractController
{
   // use dbConnectionTrait;

    private $data = false;

    /**
     * Main Add Method
     *
     * @return void
     */
    private function saveValue()
    {  
        
        var_dump($this->getConn());
        die;

        $table = $this->getConn()->prepare("INSERT INTO savevalue(valdata) VALUES(?)");
        $table->bind_param("ss",$this->num1);
        $table->exec($table);

        //sucess in storing value into DB.
        $this->data = true;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show()
    {
        $this->saveValue();

       return new JsonResponse(['save' => $this->data]);
    }
}