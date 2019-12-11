<?php

namespace Modules\Page\Repositories;

use Modules\Page\Entities\Page;
use App\Repositories\Eloquent\BaseRepository;

class PageRepository extends BaseRepository 
{
  
    /**
     * PageRepository constructor.
     *
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->model = $page;
    }

}
