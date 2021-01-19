<?php

namespace App\Services;

use App\Events\Student\StudentDeleted;
use App\Events\Student\StudentCreated;
use App\Events\Student\StudentUpdated;
use App\Exceptions\GeneralException;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class StudentService.
 */
class StudentService extends BaseService
{
    /**
     * StudentService constructor.
     *
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    /**
     * @param  array  $data
     *
     * @return Student
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): Student
    {
        $user = auth()->user();
        DB::beginTransaction();

        try {
            $student = $this->model::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'date_birth' => $data['date_birth'],
                'disabilities' => $data['disabilities'],
                'foster_care' => $data['foster_care'],
                'social_assistance' => $data['social_assistance'],
                'school_id' => $user->school_id,
                'user_id' => $user->id,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the student.'));
        }

        event(new StudentCreated($student));

        DB::commit();

        return $student;
    }

    /**
     * @param Student $student
     * @param array $data
     *
     * @return Student
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(Student $student, array $data = []): Student
    {
        DB::beginTransaction();

        try {
            $student->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'date_birth' => $data['date_birth'],
                'disabilities' => $data['disabilities'],
                'foster_care' => $data['foster_care'],
                'social_assistance' => $data['social_assistance'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the student.'));
        }

        event(new StudentUpdated($student));

        DB::commit();

        return $student;
    }

    /**
     * @param  Student  $student
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Student $student): bool
    {
        if ($this->deleteById($student->id)) {
            event(new StudentDeleted($student));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the student.'));
    }
}
