<?php

namespace Modules\Boukarian\Entities;

use App\Utilities\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSubmission extends Model
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
    protected $table = 'project_submissions';

	/**
	* primary key
	*/
	protected $primaryKey = "id";

    public function __construct(array $attributes = array()) {
       parent::__construct($attributes);
    }

    public function save(array $options = []){
        //$this->slug=str_slug($this->title, '-');
        // before save code
         parent::save($options);
        // after save code
   }
}
