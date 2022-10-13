<?php
require_once '.\app\controllers\phoen.controller.php';
require_once '.\app\controllers\login.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$phoneController = new PhoneController();

switch ($params[0]) {
    case 'log':
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;

    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'home':
        $phoneController->showHome();
        break;
    case 'admin':
        $authController = new AuthHelper();
        $authController->checkLoggedIn();
        $phoneController->showAdmin();
        break;
    case 'add':
        $phoneController->addPhone();
        break;
    case 'add_brand':
        $phoneController->addBrand();
        break;
    case 'delete':
        $id = $params[1];
        $phoneController->deletePhone($id);
        break;
    case 'formedit':
        $id = $params[1];
        $phoneController->showFormEdit($id);
        break;
    case 'editphone':
        $id = $params[1];
        $phoneController->editPhone($id);
        break;
    case 'viewphone':
        $id = $params[1];
        $phoneController->showPhone($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
