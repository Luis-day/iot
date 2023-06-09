<?php 
use Iot\Core\Config;
use Iot\Core\Router;
use Iot\Core\Request;
use Iot\Utils\DependencyInjector;
use Iot\Models\UsuarioModel;

require_once __DIR__ . '/vendor/autoload.php';


// Sessions are always turned on
if (!isset($_SESSION)) {
	session_start();
}


// Config  DB parameters
$config = new Config();

// Database
$dbConfig = $config->get('db');

try {
	$db = new PDO(
    	'mysql:host=127.0.0.1;dbname=2023_ti801_iot',
    	$dbConfig['user'],
    	$dbConfig['password']
		);
	//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Iot ITESS-TICS servicio no disponible!! ';
    //echo  $e->getMessage();
    exit();
}

// twig view engine
$loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
$view = new Twig_Environment($loader);

//$log = new Logger('Iot');
//$logFile = $config->get('log');
//$log->pushHandler(new StreamHandler($logFile, Logger::DEBUG));

$di = new DependencyInjector();
$di->set('PDO', $db);
$di->set('Utils\Config', $config);
$di->set('Twig_Environment', $view);
//$di->set('Logger', $log);

// setup model
//$di->set('UsuarioModel', new UsuarioModel($di->get('PDO')));

// router
$router = new Router($di);
$response = $router->route(new Request());
echo $response;