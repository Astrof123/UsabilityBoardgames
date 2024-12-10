<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boardgame extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'min_player', 'max_player', 'price', 'full_description',
        'mini_description', 'rules', 'series_id'
    ];
}
