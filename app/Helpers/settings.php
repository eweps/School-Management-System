<?php

use App\Models\Setting;

if (!function_exists('getSetting')) {
    /**
     * Get a setting value from the settings table with an optional default.
     *
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    function getSetting(string $name, $default = null)
    {
        static $settingsCache = [];

        if (array_key_exists($name, $settingsCache)) {
            return $settingsCache[$name];
        }

        $value = Setting::where('name', $name)->value('value');

        $settingsCache[$name] = $value ?? $default;

        return $settingsCache[$name];
    }
}
