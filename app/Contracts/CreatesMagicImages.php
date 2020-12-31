<?php


namespace App\Contracts;


use App\Models\Team;
use App\Models\User;

interface CreatesMagicImages
{
    /**
     * @param User $user
     * @param array $input
     * @return mixed
     */
    public function create($user, array $input);

    /**
     * @return string
     */
    public function redirectTo();
}
