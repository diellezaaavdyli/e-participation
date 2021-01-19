<?php

namespace App\Models;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = [
        'reply',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
