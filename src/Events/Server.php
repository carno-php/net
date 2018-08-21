<?php
/**
 * Events of server (master)
 * User: moyo
 * Date: 29/09/2017
 * Time: 11:44 AM
 */

namespace Carno\Net\Events;

interface Server
{
    /**
     * Server created
     */
    public const CREATED = 0xA0;

    /**
     * Server startup
     */
    public const STARTUP = 0xA1;

    /**
     * Server shutdown
     */
    public const SHUTDOWN = 0xA9;
}
