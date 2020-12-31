<?php


namespace App\GD;

use GD\Models\Image;
use ReflectionClass;

class DMI
{
    /** @var Image $main */
    public $main;
    public $input;
    private $data=[];

    public function res($file,$type){
        return Base::res($file,$type);
    }

    public function resData($file,$type){
        return Base::readFile(Base::res($file,$type));
    }

    public function __get($name){
        if(isset($this->data[$name])){
            return $this->data[$name];
        }
        if (preg_match("/^[A-Z0-9]*$/", substr($name,0,1))) {
            return new StaticClass('GD\\' . $name);
        }
        return null;
    }

}
