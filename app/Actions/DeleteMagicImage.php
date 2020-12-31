<?php

namespace App\Actions;

use App\Contracts\DeletesMagicImages;
use Illuminate\Support\Facades\Gate;

class DeleteMagicImage implements DeletesMagicImages
{
    private $redirectTo;
    public function delete($user, $magicImage)
    {
        Gate::forUser($user)->authorize('delete',$magicImage->team);
        $magicImage->purge();
        $this->redirectTo=route('magic-images.index');
    }

    public function redirectTo()
    {
        return $this->redirectTo;
    }
}
