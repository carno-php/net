<?php
/**
 * Net server API
 * User: moyo
 * Date: 10/02/2018
 * Time: 9:13 PM
 */

namespace Carno\Net\Contracts;

interface Server
{
    /**
     * @return object
     */
    public function raw() : object;

    /**
     * @return int
     */
    public function pid() : int;

    /**
     */
    public function stop() : void;
}
