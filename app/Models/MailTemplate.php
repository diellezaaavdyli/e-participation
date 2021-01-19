<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    protected $fillable = [
        'name',
        'header',
        'body',
    ];

    public static function returnMail($name)
    {
        $mail = MailTemplate::where('name', $name)->first();
        if(!$mail){
            return false;
        } else {
            return $mail;
        }
    }
}
