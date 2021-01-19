<?php

namespace App\Events\School;

use App\Models\School;
use Illuminate\Queue\SerializesModels;

/**
 * Class SchoolCreated.
 */
class SchoolCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $school;

    /**
     * @param $school
     */
    public function __construct(School $school)
    {
        $this->school = $school;
    }
}
