<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;

class UserRepository extends BaseRepository 
{

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
