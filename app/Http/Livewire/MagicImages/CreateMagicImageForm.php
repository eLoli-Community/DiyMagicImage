<?php

namespace App\Http\Livewire\MagicImages;

use App\Contracts\CreatesMagicImages;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\RedirectsActions;
use Livewire\Component;

class CreateMagicImageForm extends Component
{
    use RedirectsActions;
    public $state = [];
    public function render()
    {
        return view('magic-images.create-magic-image-form');
    }
    public function getUserProperty()
    {
        return Auth::user();
    }
    public function createMagicImage(CreatesMagicImages $creator){
        $this->resetErrorBag();
        $creator->create(Auth::user(), $this->state);

        return $this->redirectPath($creator);
    }
}
