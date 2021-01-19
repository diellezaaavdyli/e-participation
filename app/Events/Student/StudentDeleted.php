<?php

namespace App\Events\Student;

use App\Models\student;
use Illuminate\Queue\SerializesModels;

/**
 * Class studentDeleted.
 */
class StudentDeleted
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
