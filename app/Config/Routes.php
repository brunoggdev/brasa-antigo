<?php

namespace Config;

use App\Controllers\PaginasController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// rota inicial
$routes->get('/', 'PaginasController::index');

// especifique rotas que deseja realizar alguma lógica antes enviar resposta
$routes->get('/login', 'PaginasController::login');

$routes->post('login', 'UsuariosController::login');

//rotas restritas
$routes->group('', ['filter' => 'autenticar'], function ($routes){

    // note que esta rota seria mapeada na rota padrão mas está declarada aqui para
    // ser considerada restrita, passando o nome da view desejada para o metodo mostrar (/restrito).
    $routes->get('restrito', 'PaginasController::mostrar/restrito');

    // rotas exclusivas para admin
    $routes->group('', ['filter' => 'admin'], function ($routes){

        //
        
    });



    $routes->post('logout', 'UsuariosController::logout');

});


// rota padrão: caso não tenha sido mapeada nas rotas específicas acima, esta
// irá buscar uma view com o nome requisitado na url (útil para páginas estáticas).
$routes->get('(:any)', 'PaginasController::mostrar/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
