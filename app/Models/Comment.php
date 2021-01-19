<?php

namespace App\Models;
use App\Models\User;
use App\Models\Issue;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function issue(){
        return $this->belongsTo(Issue::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
