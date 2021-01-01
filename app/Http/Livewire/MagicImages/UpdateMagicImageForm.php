<?php

namespace App\Http\Livewire\MagicImages;

use App\Contracts\ShowMagicImage;
use App\Contracts\UpdatesMagicImages;
use App\GD\Draw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class UpdateMagicImageForm extends Component
{
    public $magicImage;
    public $imageUrl;
    public $imageOutput;

    public function mount($magicImage)
    {
        $this->magicImage = $magicImage;
        $this->debugMagicImage($magicImage->script);
    }
    public function debugMagicImage($script){
        $shower=(new Draw());
        $this->imageUrl='data:image/png;base64,'.base64_encode(
                $shower->make($script,Request::all())
            );
        $this->imageOutput=$shower->getOutputString();
        $debug=debugbar()->getJavascriptRenderer()->render(false);
        $debug=substr($debug,31,strlen($debug)-41);
        $debug=''.$debug;
        $this->emit('debug',$debug);
    }

    public function updateMagicImageScript($script,UpdatesMagicImages $updater){
        $this->resetErrorBag();
        $updater->update(Auth::user(),$this->magicImage,['script'=>$script]);
        $this->debugMagicImage($script);

        $this->emit('saved');

    }
    public function render()
    {
        return view('magic-images.update-magic-image-form');
    }
}
