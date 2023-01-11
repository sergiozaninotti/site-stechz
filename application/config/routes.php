<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['creative-studio'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'dashboard';
$route['product'] = 'dashboard';

$route['login'] = 'dashboard/login';
$route['overview'] = 'dashboard/overview';

$route['projetos-finalizados/(:any)'] = 'projetos/$1';

$route['contato'] = 'contato';

$route['nossos-servicos'] = 'servicos';
$route['nossos-servicos/(:any)'] = 'servicos/$1';

