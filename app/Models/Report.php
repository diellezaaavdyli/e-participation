<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City.
 */
class City extends Model
{

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'state_id',
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
    public function schools()
    {
        return $this->hasMany('School');
    }
}
