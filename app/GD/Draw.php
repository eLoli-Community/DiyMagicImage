<?php

namespace App\GD;

use App\Contracts\ShowMagicImage;

class Draw implements ShowMagicImage
{
    public $replace = [];
    public $img = [];
    public $input;
    public $script;
    public $output;

    public function make($script, $input)
    {
        $this->input = $input;
        $this->script=$script;
        $dmi=new DMI();
        $dmi->input=$this->input;
        //\V8Js::registerExtension();
        try {
            $js = new \V8Js('PHP', [], []);
            $js->DMI=$dmi;
            $js->setTimeLimit(1024);
            $loader= new ModuleLoader();
            $js->setModuleLoader([$loader,'load']);
            foreach(Base::scanDir(Base::app('boot')) as $file){
                $js->executeString(Base::readFile($file));
            }
            ob_start();
            $js->executeString($this->script);
            $this->output=ob_get_contents();
            ob_end_clean();
        }catch (\V8JsScriptException $e){
            debugbar()->addThrowable($e);
        }
        return $dmi->main->getAsString();
    }

    public function getOutputString()
    {
        return $this->output;
    }
}
