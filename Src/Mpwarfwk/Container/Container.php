<?php

namespace Mpwarfwk\Container;
use Symfony\Component\Yaml\Parser;
use ReflectionClass;
use Exception;
use Smarty;
use PDO;
use Twig_Loader_Filesystem;
use Twig_Environment;

class Container{

    private $arguments;

    public function __construct() {

        $this->arguments = array();
    }

    public function get($service){

        $yaml = new Parser();
        $servicesList = $yaml->parse(file_get_contents('../src/Config/services.yml'));

        if (array_key_exists($service, $servicesList)) {
            if (!empty($servicesList[$service]['arguments'])) {
                foreach ($servicesList[$service]['arguments'] as $currentArgument) {
            
                    $this->arguments[] = new $currentArgument();
                }
            }

            $reflection = new ReflectionClass($servicesList[$service]['class']);
            return $reflection->newInstanceArgs($this->arguments);
        }

        throw new Exception(' EL SERVICIO NO EXISTE !!');
    }
}