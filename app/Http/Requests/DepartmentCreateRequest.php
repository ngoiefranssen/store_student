<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentCreateRequest extends FormRequest
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

            'name' => ['required'],
            'faculty_id' => ['required'],
            'level_id' => ['required'],
        ];
        // [
        //     'name.required' => 'Please complete the name field for registration',
        //     'faculty_id.required' => 'choose the corresponding faculty for registration',
        //     'level_id' => 'choose the corresponding level for recording',
        // ];
    }
}
