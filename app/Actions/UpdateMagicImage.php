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

        $input=Validator::make($input, [
            'name' => ['string', 'max:255'],
            'script' => ['string'],
            'configure' => ['string'],
        ])->validateWithBag('UpdateMagicImage');

        $magicImage->forceFill($input)->save();
    }
}
