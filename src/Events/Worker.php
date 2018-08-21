<?php
/**
 * Events of worker (process)
 * User: moyo
 * Date: 2018/8/2
 * Time: 2:49 PM
 */

namespace Carno\Net\Events;

interface Worker
{
    /**
     * Worker started
     */
    public const STARTED = 0xD1;

    /**
     * Worker stopped
     */
    public const STOPPED = 0xD8;

    /**
     * Worker error
     */
    public const FAILURE = 0xD9;
}
