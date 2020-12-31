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
        debugbar()->enable();
        debugbar()->boot();
        //\V8Js::registerExtension();
        try {
            debugbar()->startMeasure('JsEval');
            debugbar()->startMeasure('JsInit');
            debug('Js init');
            $js = new \V8Js('PHP', [], []);
            $js->DMI=$dmi;
            $js->setTimeLimit(1024);
            $loader= new ModuleLoader();
            $js->setModuleLoader([$loader,'load']);
            debugbar()->stopMeasure('JsInit');
            debugbar()->startMeasure('JsBoot');
            debug('Js boot scan: '.Base::app('boot'));
            foreach(Base::scanDir(Base::app('boot')) as $file){
                debug('Js boot: '.$file);
                $js->executeString(Base::readFile($file));
            }
            debugbar()->stopMeasure('JsBoot');
            debugbar()->startMeasure('JsExecute');
            debug('Js execute: '.$this->script);
            ob_start();
            $js->executeString($this->script);
            $this->output=ob_get_contents();
            debug('Js output: '.$this->output);
            ob_end_clean();
            debugbar()->stopMeasure('JsExecute');
            debugbar()->stopMeasure('JsEval');
        }catch (\V8JsScriptException $e){
            debug('Js Exception: ',$e);
            debugbar()->addThrowable($e);
        }
        return $dmi->main->getAsString();
    }

    public function getOutputString()
    {
        return $this->output;
    }
}
