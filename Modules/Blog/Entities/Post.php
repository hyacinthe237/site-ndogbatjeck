<?php

namespace Modules\Blog\Entities;

use App\Utilities\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
     use SoftDeletes, Uuids;

     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

	/**
	* primary key
	*/
	protected $primaryKey = "id";

    public function category () {
        return $this->belongsTo("Modules\Blog\Entities\PostCategory", 'category_id');
    }

    public function lastUpadedBy () {
        return $this->belongsTo("App\Models\User", 'last_updated_by');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function __construct(array $attributes = array()) {
       parent::__construct($attributes);
    }

    public function save(array $options = []){
      $this->slug=str_slug($this->title, '-');
      // before save code
      parent::save($options);
      // after save code
   }
}
