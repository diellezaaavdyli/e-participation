<?php

namespace App\Events\School;

use App\Models\School;
use Illuminate\Queue\SerializesModels;

/**
 * Class SchoolDeleted.
 */
class SchoolDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $school;

    /**
     * @param School $school
     */
    public function __construct(School $school)
    {
        $this->school = $school;
    }
}
