<?php

namespace App\Events\Student;

use App\Models\Student;
use Illuminate\Queue\SerializesModels;

/**
 * Class studentUpdated.
 */
class StudentUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $student;

    /**
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }
}
