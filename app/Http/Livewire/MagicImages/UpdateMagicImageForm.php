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
    public $state=[];
    public $magicImage;
    public $imageUrl;
    public $imageOutput;

    public function mount($magicImage)
    {
        $this->magicImage = $magicImage;
        $this->state = [
            'name' => $magicImage->name,
            'script' => $magicImage->script,
            'configure' =>  $magicImage->configure
        ];
        $this->debugMagicImage();
    }
    private function debugMagicImage(){
        $shower=(new Draw());
        $this->imageUrl='data:image/png;base64,'.base64_encode(
                $shower->make($this->magicImage->script,Request::all())
            );
        $this->imageOutput=$shower->getOutputString();
    }

    public function updateMagicImage(UpdatesMagicImages $updater){
        $this->resetErrorBag();

        $updater->update(Auth::user(),$this->magicImage,$this->state);
        $this->debugMagicImage();

        $debug=debugbar()->getJavascriptRenderer()->render(false);
        $debug=substr($debug,31,strlen($debug)-41);
        $debug='phpdebugbar.restore();'.$debug;
        $this->emit('saved',$debug);

    }
    public function render()
    {
        return view('magic-images.update-magic-image-form');
    }
}
