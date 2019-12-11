<?php

namespace Modules\Project\Repositories;

use Modules\Project\Entities\Theme;
use App\Repositories\Eloquent\BaseRepository;

class ThemeRepository extends BaseRepository 
{
  
    /**
     * ThemeRepository constructor.
     *
     * @param Theme $theme
     */
    public function __construct(Theme $theme)
    {
        $this->model = $theme;
    }

}
