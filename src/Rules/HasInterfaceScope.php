<?php

namespace Laraning\NovaSurveyor\Rules;

use Illuminate\Contracts\Validation\Rule;

class HasInterfaceScope implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array('Illuminate\Database\Eloquent\Scope', class_implements($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('nova-surveyor::validation.interface_scope_inexistant');
    }
}
