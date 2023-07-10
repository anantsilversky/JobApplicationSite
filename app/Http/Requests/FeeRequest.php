<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
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
            'job_id' => 'required',
            'UC' => ['required', 'integer'],
            'OBC' => ['required', 'integer', 'lt:UC'],
            'SC' => ['required', 'integer', 'lt:OBC'],
            'ST' => ['required', 'integer', 'lte:SC'],
        ];
    }
}
