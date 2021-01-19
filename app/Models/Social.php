<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'name','url'
    ];

    public static function returnSocialValue($name)
    {
        $social = Social::where('name', $name)->first();
        if(!$social){
            return '';
        }
        return $social->url;
    }
    public static function getSocials()
    {
        $socials = Social::all();
        return $socials;
    }
}
