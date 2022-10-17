<?php
require_once '.\app\controllers\phone.controller.php';
require_once '.\app\controllers\login.controller.php';
require_once '.\app\controllers\brand.controller.php';
require_once '.\app\controllers\public.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);
session_start();
$phoneController = new PhoneController();
$PublicController = new PublicController();
$BrandController = new BrandController();
$authController = new AuthController();
switch ($params[0]) {
    case 'log':
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController->validateUser();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'home':
        $PublicController->showHome();
        break;
    case 'listar':
        $id = $params[1];
        $PublicController->showPhoneByGenre($id);
        break;
    case 'add_brand':
        $BrandController->add();
        break;
    case 'delete_brand':
        $id = $params[1];
        $BrandController->delete($id);
        break;
    case 'edit_brand':
        $id = $params[1];
        $BrandController->edit($id);
        break;
    case 'add':
        $phoneController->add();
        break;
    case 'delete':
        $id = $params[1];
        $phoneController->delete($id);
        break;
    case 'formedit':
        $id = $params[1];
        $phoneController->showFormEdit($id);
        break;
    case 'edit':
        $id = $params[1];
        $phoneController->edit($id);
        break;
    case 'viewphone':
        $id = $params[1];
        $PublicController->showPhone($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
