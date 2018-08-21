<?php
/**
 * Events of socket (client, server)
 * User: moyo
 * Date: 29/09/2017
 * Time: 11:46 AM
 */

namespace Carno\Net\Events;

interface Socket
{
    /**
     * Connected to server
     */
    public const CONNECTED = 0xB1;

    /**
     * TCP packet receive
     */
    public const RECEIVED = 0xB5;

    /**
     * UDP packet receive
     */
    public const PACKET = 0xB6;

    /**
     * Sock has been closed
     */
    public const CLOSED = 0xB7;

    /**
     * Error occurred
     */
    public const ERROR = 0xB9;
}
