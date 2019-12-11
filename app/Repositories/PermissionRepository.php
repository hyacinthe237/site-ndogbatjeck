<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Eloquent\BaseRepository;

class PermissionRepository extends BaseRepository
{

    /**
     * UserRepository constructor.
     *
     * @param Permission $Role
     */
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }
}
