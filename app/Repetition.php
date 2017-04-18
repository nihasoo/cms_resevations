<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repetition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','interval','data','start_date','end_date'
    ];

    /**
     * Repetition belongs to Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
}
