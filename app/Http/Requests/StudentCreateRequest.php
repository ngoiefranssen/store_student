<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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

            'name_student' =>['required', 'max:20'],
            'fisrt_name' => ['required', 'max:20'],
            'kind' => ['required', 'max:2'],
            'registration_number' => ['required', 'max:20'],
            'image_url' => ['image', 'mimes:jpg, png, jpeg'],
        ];
    }
}
