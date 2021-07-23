<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class DateAfterOtherFieldRule implements Rule
{
    private $relatedFieldValue;
    private $attribute;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($relatedFieldValue)
    {
        $this->relatedFieldValue = $relatedFieldValue;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;
        return (new Carbon($value))
            ->isAfter(new Carbon($this->relatedFieldValue));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The {$this->attribute} field must be after {$this->relatedFieldValue}.";
    }
}
