<?php

namespace Newsletter2Go\Helpers;

use Plenty\Plugin\ConfigRepository;

class CallbackConfig extends ConfigRepository
{

    /**
     * Determine if the given configuration value exists.
     * @param string $key
     * @return bool
     */
    public function has(
        string $key
    ):bool
    {
        parent::has($key);
    }

    /**
     * Get the specified configuration value.
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get(
        string $key,
        $default = null
    ):mixed
    {
        parent::get($key, $default);
    }

    /**
     * Set a given configuration value.
     * @param string $key
     * @param null $value
     */
    public function set(
        string $key,
        $value = null
    )
    {
        parent::set($key, $value);
    }

    /**
     * Prepend a value onto an array configuration value.
     * @param string $key
     * @param $value
     */
    public function prepend(
        string $key,
        $value
    )
    {
        parent::prepend($key, $value);
    }

    /**
     * Push a value onto an array configuration value.
     * @param string $key
     * @param $value
     */
    public function push(
        string $key,
        $value
    )
    {
        parent::push($key, $value);
    }

    public static function getPrefix()
    {
        parent::getPrefix();
    }
}