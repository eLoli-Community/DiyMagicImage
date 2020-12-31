<?php

namespace App\Http\Livewire\MagicImages;

use App\Contracts\DeletesMagicImages;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Actions\ValidateTeamDeletion;
use Laravel\Jetstream\Contracts\DeletesTeams;
use Laravel\Jetstream\RedirectsActions;
use Livewire\Component;

class DeleteMagicImageForm extends Component
{
    use RedirectsActions;

    public $magicImage;

    public $confirmingMagicImageDeletion = false;

    public function mount($magicImage)
    {
        $this->magicImage = $magicImage;
    }

    public function deleteMagicImage(DeletesMagicImages $deleter)
    {
        $deleter->delete(Auth::user(),$this->magicImage);

        return $this->redirectPath($deleter);
    }


    public function render()
    {
        return view('magic-images.delete-magic-image-form');
    }
}
