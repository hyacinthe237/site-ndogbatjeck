<?php

namespace Modules\Activity\Entities;

use Carbon\Carbon;
use App\Utilities\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
     use SoftDeletes, Uuids;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'title', 'tags', 'image', 'location', 'is_frequent', 'subject_id',
         'excerpt', 'description', 'published', 'is_commentable', 'is_anchor',
         'published_at', 'date_activity', 'time_activity', 'last_updated_by', 'last_updated_by', 'fonction'
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
    protected $table = 'activities';

    protected $extends = ['hour', 'minutes', 'isPast'];

	/**
	* primary key
	*/
	protected $primaryKey = "id";

    public function subjects () {
        return $this->belongsTo("Modules\Activity\Entities\Subject", 'subject_id');
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


   public function getHourAttribute () {
       $times =  explode(':', $this->time_activity);
       return sizeof($times) > 1 ? $times[0] : '';
   }

   public function getMinutesAttribute () {
       $times =  explode(':', $this->time_activity);
       return sizeof($times) > 1 ? $times[1] : '';
   }

   public function getIsPastAttribute ()
   {
       $str = '';
       $dt = Carbon::parse($this->date_activity);
       if ($dt->isPast()) $str = 'Passé';
       if ($dt->isFuture()) $str = 'A venir';
       if ($dt->isToday()) $str = 'Aujourd\'hui';

       return $str;
   }
}
