<?php

namespace App\Events\City;

use App\Models\City;
use Illuminate\Queue\SerializesModels;

/**
 * Class CityCreated.
 */
class CityCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $city;

    /**
     * @param $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
}
