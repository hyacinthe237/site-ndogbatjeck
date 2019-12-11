<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Eloquent\BaseRepository;

class RoleRepository extends BaseRepository
{

    /**
     * UserRepository constructor.
     *
     * @param Role $Role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }
}
