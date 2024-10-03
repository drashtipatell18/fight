<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingMaster extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'booking_masters';
    protected $fillable = ['booking_id','total_amount','discount','paid_amount','booking_date','booking_time','payment_id','payment_status'];
    public function bookingdetail()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'id');
    }
}
