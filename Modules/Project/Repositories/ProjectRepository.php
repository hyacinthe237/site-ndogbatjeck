<?php

namespace Modules\Project\Repositories;

use Modules\Project\Entities\Project;
use App\Repositories\Eloquent\BaseRepository;

class ProjectRepository extends BaseRepository 
{
  
    /**
     * ProjectRepository constructor.
     *
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

     /**
     * Get number of the records
     *
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginator
     */
    public function page($number = 10, $sort = 'desc', $sortColumn = 'id')
    {
        $this->applyCriteria();
        
        return $this->model->with('theme')->where('published', 'published')->orderBy($sortColumn, $sort)->paginate($number);
    }

}
