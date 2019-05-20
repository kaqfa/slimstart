<?php
use Slim\Views\PhpRenderer;
use Slim\Handlers\NotFound; 


$container = $app->getContainer();

$container['tpl'] = function($c){
    $render = new PhpRenderer("./templates");
    $render->addAttribute('baseUrl', $c->get('settings')['base_url']);
    return $render;
};

$container['pdo'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
                   $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};


class NotFoundHandler extends NotFound {

    private $view;

    public function __construct($view) { 
        $this->view = $view; 
    }

    public function __invoke($request, $response) { 
        parent::__invoke($request, $response);
        $this->view->render($response, '404.php');
        return $response->withStatus(404); 
    }
}


$container['notFoundHandler'] = function ($c) {
    return new NotFoundHandler($c->get('tpl'), 
    	function ($request, $response) use ($c) { 
        	return $c['response']->withStatus(404); 
    }); 
};

# -----------------------------------------------------------------------------
# Factories Models
# -----------------------------------------------------------------------------
$container['App\Models\Staff'] = function ($c) {
    return new App\Models\Staff(
        $c->get('pdo')
    );
};

# -----------------------------------------------------------------------------
# Factories Controllers
# -----------------------------------------------------------------------------
$container['App\Controllers\AdminController'] = function ($c) {
    return new App\Controllers\AdminController(
		$c->get('tpl')
    );
};

$container['App\Controllers\LoginController'] = function ($c) {
    return new App\Controllers\LoginController(
		$c->get('tpl'), $c->get('App\Models\Staff')
    );
};

