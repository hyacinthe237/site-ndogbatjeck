<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\Post;
use App\Repositories\Eloquent\BaseRepository;

class PostRepository extends BaseRepository
{

    /**
     * PostRepository constructor.
     *
     * @param Post $postCategory
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
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

        return $this->model->where('status', 'published')->orderBy($sortColumn, $sort)->orderBy('id', 'desc')->paginate($number);
    }


    public function otherPosts($slug, $limit = 3)
    {
        return Post::where('slug', '!=', $slug)->inRandomOrder()->take($limit)->get();
    }

}
