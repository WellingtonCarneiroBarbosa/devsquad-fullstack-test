<?php

namespace App\Http\Requests\User;

use App\Rules\DailyLogSentencesRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDailyLogRequest extends FormRequest
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

    public function rules()
    {
        return [
            'log' => ['required', new DailyLogSentencesRule()],
            'day' => ['required', 'date'],
        ];
    }
}
