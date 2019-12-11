<?php

namespace Modules\Boukarian\Repositories;

use Modules\Boukarian\Entities\ProjectSubmission;
use App\Repositories\Eloquent\BaseRepository;

class ProjectSubmissionRepository extends BaseRepository 
{
  
    /**
     * ProjectSubmissionRepository constructor.
     *
     * @param ProjectSubmission $project
     */
    public function __construct(ProjectSubmission $project)
    {
        $this->model = $project;
    }

}
