<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class popular_place extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'popular_places';
    protected $fillable = ['name','description','image','banner_image','banner_text'];
}
