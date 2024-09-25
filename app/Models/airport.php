<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class airport extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'airports';
    protected $fillable = ['image','city','name','description'];
}
