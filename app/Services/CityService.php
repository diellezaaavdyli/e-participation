<?php

namespace App\Services;

use App\Events\City\CityDeleted;
use App\Events\City\CityCreated;
use App\Events\City\CityUpdated;
use App\Exceptions\GeneralException;
use App\Models\City;
use App\Models\Role;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class CityService.
 */
class CityService extends BaseService
{
    /**
     * CityService constructor.
     *
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->model = $city;
    }

    /**
     * @param  array  $data
     *
     * @return City
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): City
    {
        DB::beginTransaction();

        try {
            $city = $this->model::create(['name' => $data['name']]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the city.'));
        }

        event(new CityCreated($city));

        DB::commit();

        return $city;
    }

    /**
     * @param  Role  $role
     * @param  array  $data
     *
     * @return Role
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(City $city, array $data = []): City
    {
        DB::beginTransaction();

        try {
            $city->update(['name' => $data['name']]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the city.'));
        }

        event(new CityUpdated($city));

        DB::commit();

        return $city;
    }

    /**
     * @param  City  $city
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(City $city): bool
    {
        if ($this->deleteById($city->id)) {
            event(new CityDeleted($city));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the city.'));
    }
}
