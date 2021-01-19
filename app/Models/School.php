<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class School.
 */
class School extends Model
{
    /**
     * @var string[]
     */
    protected $with = [
        'city',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'city_id',
        'principal_id',
        'enabled',
    ];

    /**
     * @var string[]
     */
    protected $dates = [

    ];

    /**
     * @var string[]
     */
    protected $casts = [
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

    /**
     * @return mixed
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
