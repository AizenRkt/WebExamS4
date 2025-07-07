<?php

//importation de controller
use app\controllers\Controller;
use app\controllers\EtudiantController;

use app\controllers\transaction\TransactionController;
use app\controllers\transaction\StatusTransactionController;
use app\controllers\transaction\DetailTransactionController;

//importation lié flight
use flight\Engine;
use flight\net\Router;

//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$Controller = new Controller();
$router->get('/', [ $Controller, 'acceuil' ]);


// exemple api
$etudiant = new EtudiantController();
Flight::route('GET /etudiants', [$etudiant, 'getAll']);
Flight::route('GET /etudiants/@id', [$etudiant, 'getOne']);
Flight::route('POST /etudiants', [$etudiant, 'create']);
Flight::route('PUT /etudiants/@id', [$etudiant, 'update']);
Flight::route('DELETE /etudiants/@id', [$etudiant, 'delete']);

Flight::route('GET /hello', ['HelloController', 'afficher']);

// $router->get('/', \app\controllers\WelcomeController::class.'->home'); 

// $router->get('/hello-world/@name', function($name) {
// 	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
// });

// $router->group('/api', function() use ($router, $app) {
// 	$Api_Example_Controller = new ApiExampleController($app);
// 	$router->get('/users', [ $Api_Example_Controller, 'getUsers' ]);
// 	$router->get('/users/@id:[0-9]', [ $Api_Example_Controller, 'getUser' ]);
// 	$router->post('/users/@id:[0-9]', [ $Api_Example_Controller, 'updateUser' ]);
// });

// Routes Transaction
$transaction = new TransactionController();
Flight::route('GET /transactions', [$transaction, 'getAll']);
Flight::route('GET /transactions/@id', [$transaction, 'getOne']);
Flight::route('POST /transactions', [$transaction, 'create']);
Flight::route('PUT /transactions/@id', [$transaction, 'update']);
Flight::route('DELETE /transactions/@id', [$transaction, 'delete']);

// Routes StatusTransaction
$statusTransaction = new StatusTransactionController();
Flight::route('GET /status_transactions', [$statusTransaction, 'getAll']);
Flight::route('GET /status_transactions/@id', [$statusTransaction, 'getOne']);
Flight::route('POST /status_transactions', [$statusTransaction, 'create']);
Flight::route('PUT /status_transactions/@id', [$statusTransaction, 'update']);
Flight::route('DELETE /status_transactions/@id', [$statusTransaction, 'delete']);

// Routes DetailTransaction
$detailTransaction = new DetailTransactionController();
Flight::route('GET /detail_transactions', [$detailTransaction, 'getAll']);
Flight::route('GET /detail_transactions/@id', [$detailTransaction, 'getOne']);
Flight::route('POST /detail_transactions', [$detailTransaction, 'create']);
Flight::route('PUT /detail_transactions/@id', [$detailTransaction, 'update']);
Flight::route('DELETE /detail_transactions/@id', [$detailTransaction, 'delete']);

?>