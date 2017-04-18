<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description','reserve_date','event_date','start_time','end_time','status'
    ];

    /**
     * Reservation belongs to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Reservation belongs to many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function support_users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    /**
     * Reservation belongs to Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     *  Reservation belongs to Resource
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }

    /**
     * Reservation has one repetition
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function repetition()
    {
        return $this->hasOne('App\Repetition');
    }
}
