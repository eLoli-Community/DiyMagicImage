<?php


namespace App\GD;


use ReflectionClass;
use Symfony\Component\ErrorHandler\Error\UndefinedMethodError;

class StaticClass
{
    private static $data;
    private $reflection;
    private $name;

    public function __construct($name)
    {
        if(class_exists($name)) {
            $this->reflection = new ReflectionClass($name);
        }else{
            $this->name=$name;
        }
    }

    public function instance(...$args){
        return $this->reflection->newInstanceArgs($args);
    }

    public function __call($name, $arguments)
    {
        if($this->name){
            return (new ReflectionClass($this->name.'\\'. $name))
                ->newInstanceArgs($arguments);
        }
        if($this->reflection->hasMethod($name)){
            $method=$this->reflection->getMethod($name);
            if($method->isPublic() && $method->isStatic()){
                return $method->invokeArgs(null,$arguments);
            }
        }
    }

    public function __get($name){
        if($this->name){
            if(isset(self::$data[$this->name])
                && isset(self::$data[$this->name][$name])){
                return self::$data[$this->name][$name];
            }
            return new StaticClass($this->name.'\\'. $name);
        }
        if($this->reflection->hasProperty($name)){
            $property=$this->reflection->getProperty($name);
            if($property->isPublic() && $property->isStatic()){
                return $property->getValue();
            }
        }
        if($this->reflection->hasMethod($name)){
            $method=$this->reflection->getMethod($name);
            if($method->isPublic() && $method->isStatic()){
                return $method->getClosure();
            }
        }
        return null;
    }
    public function __set($name, $value)
    {
        if(!isset(self::$data[$this->name])){
            self::$data[$this->name]=[];
        }
        self::$data[$this->name][$name]=$value;
    }
}
