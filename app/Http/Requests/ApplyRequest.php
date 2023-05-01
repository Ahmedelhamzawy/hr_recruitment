<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'latest_company'=>'required|alpha',
            'latest_title'=>'required',
            'work_field'=>'required',
            'experience'=>'required|not_in:Experience',
            'education_level'=>'required|not_in:Education Level',
            'skills' => 'required'
        ];
    }
}
