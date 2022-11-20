<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$config = parse_ini_file(__DIR__ . '/../src/php.ini');

require_once __DIR__ . '/../vendor/autoload.php';

use MyApp\model\MyPDO;
use MyApp\model\EmployeeModel;
use MyApp\view\View;
use MyApp\controller\EmployeeController;

$model = new EmployeeModel();
$view = new View();

$path = '';
if (isset($_GET['path']))
{
    $path = $_GET['path'];
}

switch ($path)
{
    case 'employeeList':
        $viewAll = new EmployeeController($model, $view);
        $viewAll->index();
        break;
    case 'employeeForm';
        $form = new EmployeeController($model, $view);
        $form->form();
        break;
    case 'addEmployee':
        $add = new EmployeeController($model, $view);
        $add->add($_POST);
        break;
    case 'employeeEdit';
        $employeeEdit = new EmployeeController ($model, $view);
        $employeeEdit->employeeEdit($_GET['id']);
        break;
    case 'updateEmployee':
        $updateEmployee = new EmployeeController($model, $view);
        $updateEmployee->updateEmployee($_POST);
        break;
    case 'deleteEmployee':
        $deleteEmployee = new EmployeeController($model, $view);
        $deleteEmployee->delete($_GET['id']);
        break;
    case 'csvExport':
        $exportData = new EmployeeController($model, $view);
        $exportData->exportCsv();
        break;
    default:
    case 'home':
        require __DIR__ . '/../src/template/default.php';
        break;
}
