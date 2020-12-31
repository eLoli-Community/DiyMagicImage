<?php


namespace App\GD;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class ModuleLoader
{
    public $tryPaths;
    public function __construct()
    {
        $this->tryPaths=[
            '/'=>Base::app(''),
        ];
    }

    public function load($name){
        $name=Base::get_base('/',$name);
        foreach ($this->tryPaths as $k=>$v){
            if(Base::start_with($name,$k)){
                if(Base::existFile($k.$v)){
                    return Base::readFile($k.$v);
                }
            }
        }
        throw new FileNotFoundException($name);
    }
}
