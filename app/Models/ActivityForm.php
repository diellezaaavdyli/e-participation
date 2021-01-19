<?php

namespace App\Models;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class ActivityForm extends Model
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

    public function activity(){
        return $this->belongsTo(Activity::class);
    }
}
