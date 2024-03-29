<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Permission extends Model
{

    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name',
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
    protected $table = 'permissions';

    /**
    * primary key
    */
    protected $primaryKey = "id";

    public function roles() {
        return $this->belongsToMany(Role::class)
                ->withTimestamps();
    }

    public function save(array $options = []){
      $this->display_name= ucfirst(strtolower($this->display_name)); // première lettre en majuscule
      // before save code
      parent::save($options);
      // after save code
   }

}
