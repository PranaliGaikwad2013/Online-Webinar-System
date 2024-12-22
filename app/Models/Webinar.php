<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    public $timestamps = false;
    protected $table = 'webinars';
    protected $fillable = [
        'title','start_date','start_time','end_date','end_time', 'about_speaker','speaker_name','web_type','web_mode','price','image','web_desc','web_link',
       
    ];
    public function registrations()
    {
        return $this->hasMany(WebRegister::class, 'webinar_id', 'id');
    }

    public function razorpaypayment()
    {
        return $this->hasMany(Payment::class, 'webinar_id', 'id');
    }
}
