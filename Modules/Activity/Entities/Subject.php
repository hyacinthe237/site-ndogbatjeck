<?php

namespace Modules\Activity\Entities;

use App\Utilities\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
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
    protected $table = 'subjects';

	/**
	* primary key
	*/
	protected $primaryKey = "id";

    public function activities () {
        return $this->hasMany("Modules\Activity\Entities\Activity", 'subject_id');
    }

    public function parent() {
        return $this->hasOne('Modules\Activity\Entities\Subject', 'id', 'parent_id');
    }

    public function children(){
        return $this->hasMany('Modules\Activity\Entities\Subject', 'parent_id');
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
