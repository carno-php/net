<?php
/**
 * Naming (currently for service)
 * User: moyo
 * Date: 21/11/2017
 * Time: 3:37 PM
 */

namespace Carno\Net\Chips\Endpoint;

trait Naming
{
    /**
     * @var string
     */
    private $service = 'unspecified';

    /**
     * @return string
     */
    public function service() : string
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return self
     */
    public function relatedService(string $service) : self
    {
        $this->service = $service;
        return $this;
    }
}
