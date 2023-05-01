<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'company_name'=>'required|alpha',
            'job_title'=>'required',
            'job_field'=>'required',
            'job_description'=>'required|max:1500',
            'addMoreInputFields.*.skill' => 'required',
            'experience'=>'required|not_in:Experience',
            'education_level'=>'required|not_in:Education Level'
        ];
    }
}
