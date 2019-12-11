<?php

namespace Modules\Activity\Repositories;

use Modules\Activity\Entities\Activity;
use App\Repositories\Eloquent\BaseRepository;

class ActivityRepository extends BaseRepository
{

    /**
     * ActivityRepository constructor.
     *
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        $this->model = $activity;
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

        return $this->model->where('published', 'published')->orderBy($sortColumn, $sort)->orderBy('id', 'desc')->paginate($number);
    }

    public function otherActivities($slug, $limit = 3)
    {
        return Activity::where('slug', '!=', $slug)->inRandomOrder()->take($limit)->get();
    }


}
