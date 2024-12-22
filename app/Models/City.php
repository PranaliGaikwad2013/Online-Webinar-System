<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = [
        'state_id',
        'countries_id',
        'city_name',
       
    ];

    public function country()
    {
        return $this->belongsTo(Countries::class, 'countries_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    static public function getRecordJoin()
    {
        return self::with(['country', 'state'])->get();
    }
}
