<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'task_id' => 'required|integer',
            // 'monday' => 'required_without_all: tuesday, wednesday, thursday, friday, saturday, sunday',
            // 'tuesday' => 'required_without_all: monday, wednesday, thursday, friday, saturday, sunday',
            // 'wednesday' => 'required_without_all: monday, tuesday, thursday, friday, saturday, sunday',
            // 'thursday' => 'required_without_all: monday, tuesday, wednesday, friday, saturday, sunday',
            // 'friday' => 'required_without_all: monday, tuesday, wednesday, thursday, saturday, sunday',
            // 'saturday' => 'required_without_all: monday, tuesday, wednesday, thursday, friday, sunday',
            // 'sunday' => 'required_without_all: monday, tuesday, wednesday, thursday, friday, saturday',
            'schedule' => 'required',
        ];
    }
}
