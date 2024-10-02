<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeatMaster extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'seat_masters';
    protected $fillable = ['plane_id', 'seat_number', 'is_window', 'seat_type', 'seat_status', 'seat_price', 'price_incrementer'];
    public function plane()
    {
        return $this->belongsTo(PlaneMaster::class, 'plane_id');
    }
}
