<?php
namespace MyApp\controller;
use MyApp\model\EmployeeModel;
use MyApp\model\Employees;
use MyApp\view\View;
//use MyApp\model\Pagination;


class EmployeeController
{
    private EmployeeModel $model;
    private View $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function index()
    {
        $employees = $this->model->fetchAll();
        $employees = $this->model->entitiesToArray($employees);

        $this->view->setTemplate('table');
        $this->view->assign('employees', $employees);
        echo $this->view->loadTemplate();
    }

    public function exportCsv()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=employees.csv');

        $output = fopen("php://output", "w");
        fputcsv($output, ['id', 'firstname', 'lastname', 'age']);

        $employees = $this->model->fetchAll();
        $employees = $this->model->entitiesToArray($employees);

        foreach ($employees as $employee)
        {
            fputcsv($output, $employee);
        }
        fclose($output);
    }

    public function form()
    {
        $this->view->setTemplate('employeeForm');
        echo $this->view->loadTemplate();
    }

    public function add(array $employee)
    {
        $newEmployee = new Employees();
        $newEmployee->setFirstname($employee['firstname'])
            ->setLastname($employee['lastname'])
            ->setAge($employee['age']);
        $this->model->saveEmployee($newEmployee);

        header("Location: ?path=employeeList&message=employee-added");
    }

    public function employeeEdit(int $id)
    {
        $employee = $this->model->fetchById($id);

        $employee = [
            'id' => $employee->getId(),
            'firstname' => $employee->getFirstname(),
            'lastname' => $employee->getLastname(),
            'age' => $employee->getAge()
        ];
        $this->view->assign('employee', $employee);
        $this->view->setTemplate('updateEmployee');
        echo $this->view->loadTemplate();
    }

    public function updateEmployee(array $update)
    {
        $updateData = new Employees();
        $updateData->setId($update['id'])
            ->setFirstname($update['firstname'])
            ->setLastname($update['lastname'])
            ->setAge($update['age']);
        $this->model->update($updateData);

        header("Location: ?path=employeeList&message=employee-updated");
    }

    public function delete(int $id): void
    {

        $this->model->deleteById($id);

        header("Location: ?path=employeeList");
    }

    /*public function employeePager($allEmployees, $totalPages)
    {
        if(!isset($_GET['page']) ||
        intval($_GET['page']) == 0 ||
        intval($_GET['page']) == 1 ||
        intval($_GET['page']) < 0){
            $pageNumber = 1;
            $leftLimit = 0;
            $rightLimit = $this->productsPerPage;
        } elseif (intval($_GET['page']) > $totalPages ||
            intval($_GET['page']) == $totalPages){
            $pageNumber = $totalPages;
            $leftLimit = $this->productsPerPage * ($pageNumber - 1);
            $rightLimit = $allEmployees;
        } else {
            $pageNumber = intval($_GET['page']);
            $leftLimit = $this->productsPerPage * ($pageNumber-1);
            $rightLimit = $this->productsPerPage;
        }
      $this->pageData['employeesOnPage'] = $this->model->getLimitEmployees($leftLimit, $rightLimit);
    }
*/
}



