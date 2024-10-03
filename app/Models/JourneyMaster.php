<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyMaster extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'journey_masters';
    protected $fillable = ['from_city','to_city','plane_id','price','date','departure_datetime','arrival_datetime','total_stop','stop_name','stop_time','cabin_bag','checkin_bag'];

    public function plane()
    {
        return $this->belongsTo(PlaneMaster::class, 'plane_id');
    }
}


