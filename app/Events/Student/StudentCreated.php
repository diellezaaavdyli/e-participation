<?php

namespace App\Events\Student;

use App\Models\Student;
use Illuminate\Queue\SerializesModels;

/**
 * Class StudentCreated.
 */
class StudentCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $student;

    /**
     * @param $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }
}
