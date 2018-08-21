<?php
/**
 * Extension options
 * User: moyo
 * Date: 2018/7/31
 * Time: 10:23 PM
 */

namespace Carno\Net\Chips\Endpoint;

trait Options
{
    /**
     * @var array
     */
    private $options = [];

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function option(string $key, $default = null)
    {
        return $this->options[$key] ?? $default;
    }

    /**
     * @param array $override
     * @return static
     */
    public function setOptions(array $override) : self
    {
        $this->options = array_merge($this->options, $override);
        return $this;
    }
}
