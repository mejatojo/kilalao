<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jouet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_jouet',
        'photo',
        'echange',
        'status'
    ];
}
