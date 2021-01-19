<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'description',
        'name',
        'date',
        'time',
        'comment',
        'email',
        'tel',
        'type'
    ];
}
