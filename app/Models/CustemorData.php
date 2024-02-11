<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustemorData extends Model
{
    use HasFactory;
    protected $table = 'custemors_data';
    protected $fillable = [
        'user_id',
        'address',
        'phone',
    ];

    public $timestamps = false;
}
