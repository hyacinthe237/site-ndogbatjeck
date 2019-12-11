<?php

namespace Modules\Project\Entities;

use App\Utilities\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
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
    protected $table = 'themes';

	/**
	* primary key
	*/
	protected $primaryKey = "id";

    public function projects () {
        return $this->hasMany("Modules\Project\Entities\Project", 'theme_id');
    }

    public function parent() {
        return $this->hasOne('Modules\Project\Entities\Theme', 'id', 'parent_id');
    }

    public function children(){
        return $this->hasMany('Modules\Project\Entities\Theme', 'parent_id');
    }

    public function __construct(array $attributes = array()) {
       parent::__construct($attributes);
    }

    public function save(array $options = []){
        $this->slug=str_slug($this->name, '-');
        // before save code
        parent::save($options);
        // after save code
   }
}
