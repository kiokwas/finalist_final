<?php
require_once __DIR__ . '/../kernel.php';

use App\Controller\LoginController;
use App\Controller\DashboardController;
use App\Controller\ApiController;

// Basic router
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {

    case '/':
    case '/login':
        (new LoginController())->show();
        break;

    case '/dashboard':
        (new DashboardController())->show();
        break;

    case '/api/session':
        (new ApiController())->loadSession();
        break;

    case '/debug/phpinfo':
        include __DIR__ . '/../debug/phpinfo.php';
        break;

    default:
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
}
