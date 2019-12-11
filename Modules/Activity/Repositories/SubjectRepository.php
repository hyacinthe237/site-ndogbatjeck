<?php

namespace Modules\Activity\Repositories;

use Modules\Activity\Entities\Subject;
use App\Repositories\Eloquent\BaseRepository;

class SubjectRepository extends BaseRepository 
{
  
    /**
     * SubjectRepository constructor.
     *
     * @param Subject $subject
     */
    public function __construct(Subject $subject)
    {
        $this->model = $subject;
    }

}
