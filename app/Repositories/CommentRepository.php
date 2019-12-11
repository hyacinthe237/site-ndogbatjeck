<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Eloquent\BaseRepository;

class CommentRepository extends BaseRepository
{

    /**
     * @var Comment
     */
    protected $model;
    protected $baseUrl;

    /**
     * CommentRepository constructor.
     *
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
        $this->baseUrl = 'comment';
    }

    public function getByPageId($id)
    {
        return $this->model
                    ->where('commentable_id', $id)
                    ->where('commentable_type', 'Modules\Page\Entities\Page')
                    ->get();
    }

    public function getByActivityId($id)
    {
        return $this->model
                    ->where('commentable_id', $id)
                    ->where('commentable_type', 'Modules\Activity\Entities\Activity')
                    ->get();
    }

    public function getByPostId($id)
    {
        return $this->model
                    ->where('commentable_id', $id)
                    ->where('commentable_type', 'Modules\Blog\Entities\Post')
                    ->get();
    }

    public function delete($code)
    {
       $this->model = $this->getByCode($code);
       $this->model
            ->comments()
            ->detach($this->model->id);
       $this->model->delete();

       return $this->model;
    }
}
