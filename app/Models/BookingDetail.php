<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'booking_details';
    protected $fillable = ['booking_id','seat_id','first_name','last_name','dob','country','mobile_no','alternate_mobile_no','email1','email2','gender'];
    public function booking()
    {
        return $this->belongsTo(BookingMaster::class, 'booking_id', 'id');
    }
}
