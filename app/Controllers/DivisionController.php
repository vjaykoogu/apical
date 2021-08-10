<?php

namespace App\Controllers;

use App\Controllers\AbstractController;
use Laminas\Diactoros\Response\JsonResponse;

/**
 * Undocumented class
 */
class DivisionController extends AbstractController
{
    private $data;

    /**
     * Main divide Method
     *
     * @return void
     */
    private function divide()
    {
        $this->data = $this->num1 / $this->num2;
    }

    public function show()
    {
        $this->divide();

       return new JsonResponse(['answer' => $this->data]);
    }
}