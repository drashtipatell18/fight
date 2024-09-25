<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\popular_place;

class places_to_roam extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'places_to_roams';
    protected $fillable = ['image','title','description','location','exploration_time','popular_place_id'];
    public function popularPlace() {
        return $this->belongsTo(popular_place::class, 'popular_place_id');
    }
}
