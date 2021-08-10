<?php

namespace App\Controllers;

use App\Controllers\AbstractController;
use Laminas\Diactoros\Response\JsonResponse;

/**
 * Undocumented class
 */
class SubtractController extends AbstractController
{
    private $data;

    /**
     * Main subtract Method
     *
     * @return void
     */
    private function subtract()
    {
        $this->data = $this->num1 - $this->num2;
    }

    public function show()
    {
        $this->subtract();

       return new JsonResponse(['answer' => $this->data]);
    }
}