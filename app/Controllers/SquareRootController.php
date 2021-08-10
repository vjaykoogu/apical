<?php

namespace App\Controllers;

use App\Controllers\AbstractController;
use Laminas\Diactoros\Response\JsonResponse;

/**
 * Undocumented class
 */
class SquareRootController extends AbstractController
{
    private $data;

    /**
     * Main squareRoot Method
     *
     * @return void
     */
    private function squareRoot()
    {
        $this->data = sqrt($this->num1);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show()
    {
        $this->squareRoot();

       return new JsonResponse(['answer' => $this->data]);
    }
}