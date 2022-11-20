<?php
namespace MyApp\router;
use Pimple\Container;
class Router{
    private Container $container;

    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';


    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function get(): void
    {

    }
    
    public function post(): void
    {

    }
    public function run(): void
    {

    }
}