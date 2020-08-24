<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'level_course_id' => 'required',
            'bimester' => 'required',
            'unit' => 'required',
            'name' => 'required',
            'description' => 'required|min: 8',
            'positiion' => 'required'
        ];
    }
}
