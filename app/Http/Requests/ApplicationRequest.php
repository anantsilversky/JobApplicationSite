<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer'],
            'job_id' => ['required', 'integer'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'educational_details' => ['required'],
            'category' => ['required'],
            'disability' => ['required'],
            'marriage_status' => ['required'],
        ];
    }
}
