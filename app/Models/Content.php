<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'name','description', 'image'
    ];

    public static function returnContentValue($name)
    {
        $content = Content::where('name', $name)->first();
        if(!$content){
            return '';
        } else {
            return $content;
        }
    }
}
