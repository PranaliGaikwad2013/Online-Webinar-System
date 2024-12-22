<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebRegister extends Model
{
    public $timestamps = false;
    protected $table = 'web_registers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'state',
        'city',
        'country',
        'webinar_id',
    ];
    
    public function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id', 'id');
    }
}
