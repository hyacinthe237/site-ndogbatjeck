<?php

namespace Modules\Boukarian\Entities;

use App\Utilities\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
     use SoftDeletes, Uuids;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'person_type', 'name', 'corporate_name', 'field_of_activity',
         'email', 'phone', 'country', 'support_type', 'support_type_other',
         'sector_cible', 'experience', 'attente'
     ];

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
    protected $table = 'supports';

	/**
	* primary key
	*/
	protected $primaryKey = "id";
}
