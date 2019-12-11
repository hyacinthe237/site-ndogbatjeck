<?php

namespace Modules\Page\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
     use SoftDeletes;

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
    protected $table = 'pages';

	/**
	* primary key
	*/
	protected $primaryKey = "id";

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


     public function getStatusFormattedAttribute () {
         return $this->attributes['status'] === 'published' ? 'Public' : 'Privé';
     }

     public function getCreatedAtFormattedAttribute () {
         return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:i');
     }

     public function getUpdatedAtFormattedAttribute () {
         return Carbon::parse($this->attributes['updated_at'])->format('d/m/Y H:i');
     }
}
