<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student.
 */
class Student extends Model
{

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_birth',
        'disabilities',
        'foster_care',
        'social_assistance',
        'school_id',
        'user_id',
        'enabled',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'date_birth'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'disabilities' => 'boolean',
        'foster_care' => 'boolean',
        'social_assistance' => 'boolean',
        'enabled' => 'boolean',
    ];

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeEnabled($query)
    {
        return $query->whereEnabled(true);
    }
}
