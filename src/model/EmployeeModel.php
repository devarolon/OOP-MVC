<?php
namespace MyApp\model;
use PDO;

class EmployeeModel
{
    private MyPDO $pdo;

    public function __construct()
    {
        $this->pdo = MyPDO::instance();
    }

    public function fetchAll(): array
    {
        $sql = "SELECT * FROM employees";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Employees::class);
    }

    public function getLimitEmployees($leftLimit, $rightLimit){
        $result = [];
        $sql = "SELECT * FROM employees 
                LIMIT: leftLimit, :rightLimit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":leftLimit", $leftLimit, PDO::PARAM_INT);
        $stmt->bindValue(":rightLimit", $rightLimit, PDO::PARAM_INT);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;

    }

    /**
     * @param int $id
     * @return Employees
     */
    public function fetchById(int $id): Employees
    {
        $sql = "SELECT * FROM employees 
                WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchObject(Employees::class);
    }

    /**
     * @param Employees $employee
     */
    public function saveEmployee(Employees $employee): void
    {
        if ($employee->getId() > 0) {
            if (!empty($employee)) {
                $this->update($employee);
            }
            return;
        }

        $sql = "INSERT INTO employees(firstname, lastname, age)
                VALUES (:fname, :lname, :age)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":fname", $employee->getFirstname(), PDO::PARAM_STR);
        $stmt->bindValue(":lname", $employee->getLastname(), PDO::PARAM_STR);
        $stmt->bindValue(":age", $employee->getAge(), PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * @param Employees $employee
     * @return bool
     */
    public function update(Employees $employee): bool
    {
        $sql = "UPDATE employees 
                SET firstname = :fname, lastname = :lname, age = :age
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $employee->getId(), PDO::PARAM_INT);
        $stmt->bindValue(":fname", $employee->getFirstname(), PDO::PARAM_STR);
        $stmt->bindValue(":lname", $employee->getLastname(), PDO::PARAM_STR);
        $stmt->bindValue(":age", $employee->getAge(), PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteById(int $id): void
    {
        $sql = "DELETE  FROM employees 
                WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    /**
     * @param Employees[] $entities
     * @return array
     */
    public function entitiesToArray(array $entities): array
    {
        $array = [];
        /*/**
         * @var Employees $entity
         */
        foreach ($entities as $entity) {
            $array[] = $entity->getAll();
        }
        return $array;
    }
}

