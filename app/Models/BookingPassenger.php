<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingPassenger extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    protected $table = 'booking_passengers';
    protected $fillable = ['booking_id','seat_id','booking_detail_id','meal_id','price','status'];
    public function bookingMaster()
    {
        return $this->belongsTo(BookingMaster::class, 'booking_id', 'id');
    }
    public function bookingDetail()
    {
        return $this->belongsTo(BookingDetail::class, 'booking_detail_id', 'id');
    }
    public function seatMaster()
    {
        return $this->belongsTo(SeatMaster::class, 'seat_id', 'id');
    }
    public function mealMaster()
    {
        return $this->belongsTo(Meal::class, 'meal_id', 'id');
    }

}
