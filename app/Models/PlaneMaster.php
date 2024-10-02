<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaneMaster extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'plane_masters';
    protected $fillable = ['name','company_name','food_facility','image'];
}
