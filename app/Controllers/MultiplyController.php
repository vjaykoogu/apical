<?php

namespace App\Controllers;

use App\Controllers\AbstractController;
use Laminas\Diactoros\Response\JsonResponse;

/**
 * Undocumented class
 */
class MultiplyController extends AbstractController
{
    private $data;

    /**
     * Main Add Method
     *
     * @return void
     */
    private function multiply()
    {
        $this->data = $this->num1 * $this->num2;
    }

    public function show()
    {
        $this->multiply();

       return new JsonResponse(['answer' => $this->data]);
    }
}