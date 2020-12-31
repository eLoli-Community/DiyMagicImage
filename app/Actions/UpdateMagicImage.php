<?php

namespace App\Actions;

use App\Contracts\UpdatesMagicImages;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateMagicImage implements UpdatesMagicImages
{
    public function update($user, $magicImage, array $input)
    {
        Gate::forUser($user)->authorize('update',$magicImage->team);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'script' => ['required','string'],
            'configure' => ['string'],
        ])->validateWithBag('UpdateMagicImage');

        $magicImage->forceFill([
            'name' => $input['name'],
            'script' => $input['script'],
            'configure' => $input['configure']
        ])->save();
    }
}
