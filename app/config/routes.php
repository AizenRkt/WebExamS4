<?php

//importation de controller
use app\controllers\Controller;
use app\controllers\EtudiantController;
use app\controllers\HelloController;

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

?>