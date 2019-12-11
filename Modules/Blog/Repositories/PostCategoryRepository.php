<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\PostCategory;
use App\Repositories\Eloquent\BaseRepository;

class PostCategoryRepository extends BaseRepository 
{
  
    /**
     * PostCategoryRepository constructor.
     *
     * @param PostCategory $postCategory
     */
    public function __construct(PostCategory $postCategory)
    {
        $this->model = $postCategory;
    }

}
