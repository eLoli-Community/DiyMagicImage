<?php

namespace App\Http\Livewire\MagicImages;

use App\Contracts\UpdatesMagicImages;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateMagicImageForm extends Component
{
    public $state=[];
    public $magicImage;

    public function mount($magicImage)
    {
        $this->magicImage = $magicImage;
        $this->state = [
            'name' => $magicImage->name,
            'script' => $magicImage->script,
            'configure' =>  $magicImage->configure
        ];

    }

    public function updateMagicImage(UpdatesMagicImages $updater){
        $this->resetErrorBag();

        $updater->update(Auth::user(),$this->magicImage,$this->state);

        $this->emit('saved');
    }
    public function render()
    {
        return view('magic-images.update-magic-image-form');
    }
}
