<?php
namespace MyApp\model;
class Employees
{
    protected $id = 0;
    protected $firstname = '';
    protected $lastname ='';
    protected $age = 0;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Employees
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Employees
     */
    public function setFirstname(string $firstname): Employees
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Employees
     */
    public function setLastname(string $lastname): Employees
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return Employees
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function getAll(): array
    {
        return get_object_vars($this);

    }

}





