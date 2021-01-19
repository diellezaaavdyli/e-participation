<?php

namespace App\Services;

use App\Events\School\SchoolDeleted;
use App\Events\School\SchoolCreated;
use App\Events\School\SchoolUpdated;
use App\Exceptions\GeneralException;
use App\Models\School;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class SchoolService.
 */
class SchoolService extends BaseService
{
    /**
     * SchoolService constructor.
     *
     * @param School $school
     */
    public function __construct(School $school)
    {
        $this->model = $school;
    }

    /**
     * @param  array  $data
     *
     * @return School
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): School
    {
        DB::beginTransaction();

        try {
            $school = $this->model::create([
                'name' => $data['name'],
                'city_id' => $data['city_id'],
                'principal_id' => $data['principal_id'] ?? 0
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the school.'));
        }

        event(new SchoolCreated($school));

        DB::commit();

        return $school;
    }

    /**
     * @param School $school
     * @param array $data
     *
     * @return School
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(School $school, array $data = []): School
    {
        DB::beginTransaction();

        try {
            $school->update([
                'name' => $data['name'],
                'city_id' => $data['city_id'],
                'principal_id' => $data['principal_id']
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the school.'));
        }

        event(new SchoolUpdated($school));

        DB::commit();

        return $school;
    }

    /**
     * @param  School  $school
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(School $school): bool
    {
        if ($this->deleteById($school->id)) {
            event(new SchoolDeleted($school));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the school.'));
    }
}
