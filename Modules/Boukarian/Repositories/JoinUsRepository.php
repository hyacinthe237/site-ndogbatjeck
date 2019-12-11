<?php

namespace Modules\Boukarian\Repositories;

use Modules\Boukarian\Entities\JoinUs;
use App\Repositories\Eloquent\BaseRepository;

class JoinUsRepository extends BaseRepository
{

    /**
     * JoinUsRepository constructor.
     *
     * @param JoinUs $joinUs
     */
    public function __construct(JoinUs $joinUs)
    {
        $this->model = $joinUs;
    }

}
