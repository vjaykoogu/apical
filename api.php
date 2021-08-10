<?php

use MiladRahimi\PhpRouter\Router;
use App\Controllers\AddController;
use App\Controllers\DivisionController;
use App\Controllers\MultiplyController;
use App\Controllers\SubtractController;

use MiladRahimi\PhpContainer\Container;
use App\Controllers\SquareRootController;
use Laminas\Diactoros\Response\JsonResponse;

//Routes not working 
// use App\Controllers\SaveValueController;
// use App\Controllers\ClearValueController;
// use App\Controllers\RetrieveValueController;

$router = Router::create();

$router->group(['prefix' => '/v1'], function(Router $router) {

    $router->get('/', function () {
        return new JsonResponse(['message' => 'ok']);
    });

    // Arithmatic operations
    $router->post('/add',      [AddController::class, 'show']);
    $router->post('/subtract', [SubtractController::class, 'show']);
    $router->post('/multiply', [MultiplyController::class, 'show']);
    $router->post('/divide',   [DivisionController::class, 'show']);
    $router->post('/squareRoot', [SquareRootController::class, 'show']);

    // Save and Delete Value
    //SAVE API ROUTE
    $router->post('/save', function(Container $container){
        $dbCon = $container->get(App\Bootstrap\SqliteConnection::class);
        
        $data = json_decode(file_get_contents('php://input'));

        $num1 = $data->num1;
        $num2 = !empty($data->num2) ? $data->num2 : null;

        $data = ['data' => $num1];
        
        $sql = "INSERT INTO savevalue(valdata) VALUES(:data)";

        $table = $dbCon->prepare($sql);
        $table->execute($data);

        //sucess in storing value into DB.
        $this->data = true;
    });

    //SAVED VALUES
   // $router->get('/savedValue', [RetrieveValueController::class, 'show']);
   $router->get('/savedValue', function(Container $container){
        $dbCon = $container->get(App\Bootstrap\SqliteConnection::class);
        
        $sql = "SELECT count(*) FROM savevalue";

        $table = $dbCon->prepare($sql);
        $table->execute();
        $arr = $table->fetchAll(PDO::FETCH_ASSOC);

        //sucess in storing value into DB.
        var_dump($arr);

    });

    //CLEAR
    // $router->post('/clear',      [ClearValueController::class, 'show']);
    $router->post('/clear', function(Container $container){
        $dbCon = $container->get(App\Bootstrap\SqliteConnection::class);
        
        $sql = "TRUNCATE TABLE savevalue";

        $table = $dbCon->prepare($sql);
        $table->execute();
    });

});


$router->dispatch();
