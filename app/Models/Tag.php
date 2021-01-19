<?php

namespace App\Models;
use App\Models\Issue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
    ];

    public static function getTags()
    {

        return $tags =  Tag::where('status', '1')->get();

    }
    
    public function issues()
    {
        return $this->belongsToMany(Issue::class, 'issues_tags');
    }
}
