<?php

class Lib
{

}

class Api
{
    public function test(): string
    {
        return "Api::test()";
    }
}

class Service
{

    private $api;
    private $lib;

    public function __construct(Api $api, Lib $lib)
    {
        $this->api = $api;
        $this->lib = $lib;
    }

    public function fetch()
    {
        echo $this->api->test();
    }

}

$api = new Api;
$lib = new Lib;

$container = [
    strtolower(Api::class) => $api,
    strtolower(Lib::class) => $lib,
];

function someFunction(int $param, $param2)
{

}

$c = new ReflectionClass(Service::class);
$m = $c->getConstructor();
$p = $m->getParameters();
print_r($container);
print_r($p);

$params = [];
foreach($p as $o){
    $params[] = $container[$o->name];
}
print_r($params);
$service = new Service(...$params);
print_r($service);


$service->fetch();