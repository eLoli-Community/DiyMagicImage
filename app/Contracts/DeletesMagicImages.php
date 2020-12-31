<?php

namespace App\Contracts;

use App\Models\MagicImage;
use App\Models\User;

interface DeletesMagicImages
{
    /**
     * Delete the given team.
     *
     * @param User $user
     * @param MagicImage $magicImage
     * @return void
     */
    public function delete($user,$magicImage);

    /**
     * @return string
     */
    public function redirectTo();
}
