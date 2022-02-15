<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => ['required', 'max:50'],
            'faculty_id' => ['required'],
            'level_id' => ['required'],
        ];
        // [
        //     'name.required' => 'Enter name for recording',
        //     'faculty_id' => 'choose the faculty for the modification',
        //     'level_id' => 'choose the level for the modification',
        // ];
    }
}
