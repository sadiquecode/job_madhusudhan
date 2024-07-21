<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BadWordsRule implements Rule
{
    protected $badWords;

    public function __construct(array $badWords)
    {
        $this->badWords = $badWords;
    }

    public function passes($attribute, $value)
    {
        $lowercaseValue = strtolower($value);

        foreach ($this->badWords as $badWord) {
            if (strpos($lowercaseValue, $badWord) !== false) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'The :attribute contains bad words.';
    }
}
