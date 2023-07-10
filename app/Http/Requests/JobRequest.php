<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
            'minimum_qualification' => 'required',
            'minimum_age' => ['required', 'integer', 'min:15'],
            'maximum_age' => ['required', 'integer', 'gt:minimum_age'],
            'start_date' => ['required', 'date', 'after:'. Carbon::today()->addDays(2)->toDateString()],
            'end_date' => ['required', 'date', 'after:start_date'],
            'exam_date' => ['required', 'date', 'after:end_date']
        ];
    }
}
