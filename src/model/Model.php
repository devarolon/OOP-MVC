<?php
namespace MyApp\model;
class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = MyPDO::instance();
    }

}