<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class meal extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'meals';
    protected $fillable = ['name','description','price','type'];

}
