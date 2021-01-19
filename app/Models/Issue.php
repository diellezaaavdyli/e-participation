<?php

namespace App\Models;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;
class Issue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'issues_tags');
    }

    public static function getLastIssues()
    {

        return $issues = Issue::orderBy('created_at','desc')->where('status', 1)->paginate(3);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
