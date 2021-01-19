<?php

namespace App\Events\City;

use App\Models\City;
use Illuminate\Queue\SerializesModels;

/**
 * Class CityUpdated.
 */
class CityUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $city;

    /**
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
}
