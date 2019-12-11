<?php

namespace Modules\Offer\Entities;

use App\Utilities\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
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
    protected $table = 'offers';

	/**
	* primary key
	*/
	protected $primaryKey = "id";


    public function __construct(array $attributes = array()) {
       parent::__construct($attributes);
    }

    public function submissions () {
        return $this->hasMany("Modules\Offer\Entities\OfferSubmission", 'offer_id');
    }
}
