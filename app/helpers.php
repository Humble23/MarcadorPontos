<?php

use Illuminate\Support\Str;
use Illuminate\Translation\Translator;

if (!function_exists('user')) {
    /**
     * Get current logged in user.
     *
     * @return \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable
     */
    function user()
    {
        return auth('users')->user();
    }
}

if (!function_exists('__t')) {
    /**
     * A different approach to the `trans` method.
     *
     * @param string $key
     * @param string $fallback
     * @param array $replace
     * @return mixed
     */
    function __t($key, $fallback, $replace = [])
    {
        /** @var Translator $translator */
        $translator = trans();

        if ($translator->has($key, null)) {
            return $translator->get($key, $replace);
        }

        return $translator->get($fallback, $replace);
    }
}

if (!function_exists('modelName')) {
    /**
     * Get some model attribute by type.
     *
     * @param string $type
     * @return string
     */
    function modelName($type)
    {
        return __t(
            'models.' . $type . '.name',
            class_basename($type)
        );
    }
}

if (!function_exists('modelAttribute')) {
    /**
     * Get some model attribute by type.
     *
     * @param string $type
     * @param string $field
     * @return string
     */
    function modelAttribute($type, $field)
    {
        return __t(
            'models.' . $type . '.attributes.' . $field,
            'models.default.attributes.' . $field
        );
    }
}

if (!function_exists('slugfy')) {
    /**
     *  slugfy a string
     *
     * @param string $str
     * @return string
     */
    function slugfy($str)
    {
        return Str::slug($str);
    }
}

if (!function_exists('studly')) {
    /**
     *  studly a string
     *
     * @param string $str
     * @return string
     */
    function studly($str)
    {
        return Str::studly($str);
    }
}
