<?php


namespace App\Contracts;


use App\Models\MagicImage;
use App\Models\User;

interface UpdatesMagicImages
{
    /**
     * @param User $user
     * @param MagicImage $magicImage
     * @param array $input
     */
    public function update($user, $magicImage, array $input);
}
