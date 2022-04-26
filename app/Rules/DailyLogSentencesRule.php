<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DailyLogSentencesRule implements Rule
{
    /**
     * The list of blocked words
     *
     * @var string[]
     */
    protected array $blocked = [
        'SHIT',
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($this->blocked as $word) {
            if (strpos(strtolower($value), strtolower($word)) !== false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Bad word! Don't use SHIT. Please!!!";
    }
}
