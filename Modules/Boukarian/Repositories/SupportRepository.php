<?php

namespace Modules\Boukarian\Repositories;

use Modules\Boukarian\Entities\Support;
use App\Repositories\Eloquent\BaseRepository;

class SupportRepository extends BaseRepository 
{
  
    /**
     * SupportRepository constructor.
     *
     * @param Support $support
     */
    public function __construct(Support $support)
    {
        $this->model = $support;
    }

}
