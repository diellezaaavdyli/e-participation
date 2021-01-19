<?php

namespace App\Http\Requests\Backend\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreStudentRequest.
 */
class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'gender' => ['required', 'in:1,2'],
            'date_birth' => ['required'],
            'disabilities' => [''],
            'foster_care' => [''],
            'social_assistance' => [''],
            'school_id' => [''],
            'user_id' => ['']
        ];
    }
}
