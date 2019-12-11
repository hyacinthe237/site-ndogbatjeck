<?php

namespace Modules\Offer\Entities;

use App\Utilities\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferSubmission extends Model
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
    protected $table = 'offer_submissions';

	/**
	* primary key
	*/
	protected $primaryKey = "id";


    public function __construct(array $attributes = array()) {
       parent::__construct($attributes);
    }

     public function offer () {
        return $this->belongsTo("Modules\Offer\Entities\Offer", 'offer_id');
    }
}
