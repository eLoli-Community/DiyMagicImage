<?php


namespace App\Actions;


use App\Contracts\CreatesMagicImages;
use App\Models\MagicImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CreateMagicImage implements CreatesMagicImages
{
    private $redirectTo;
    public function create($user, array $input)
    {
        Gate::forUser($user)->authorize('create',$user->currentTeam);
        $input = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'script' => ['string'],
            'configure' => ['string']
        ])->validateWithBag('createMagicImage');

        $magic_image = $user->currentTeam->magic_images()->create([
            'name' => $input['name'],
            'script' => isset($input['script'])
                ? $input['script']
                : File::get(resource_path('default/script.js')) ,
            'configure' => isset($input['configure'])
                ? $input['configure']
                : File::get(resource_path('default/configure.md')),
        ]);
        $magic_image->save();
        info(get_class($magic_image));
        $this->redirectTo=route('magic-images.update',[
            'id' => $magic_image->id,
        ]);
        return $magic_image;
    }

    public function redirectTo()
    {
        return $this->redirectTo;
    }
}
