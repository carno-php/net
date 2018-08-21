<?php
/**
 * Net serving API
 * User: moyo
 * Date: 29/12/2017
 * Time: 11:54 AM
 */

namespace Carno\Net\Contracts;

interface Serving
{
    /**
     * starting the server
     */
    public function serve() : void;

    /**
     * shutdown the server
     */
    public function shutdown() : void;
}
