<?php
/**
 * Net connection API
 * User: moyo
 * Date: 29/09/2017
 * Time: 11:58 AM
 */

namespace Carno\Net\Contracts;

use Carno\Coroutine\Context;
use Carno\Net\Address;
use Carno\Net\Events;

interface Conn
{
    /**
     * some resource likes fd
     * @return int
     */
    public function id() : int;

    /**
     * conn related sequence
     * @return int
     */
    public function seq() : int;

    /**
     * context of conn session
     * @return Context
     */
    public function ctx() : Context;

    /**
     * related server object
     * @return Server
     */
    public function server() : Server;

    /**
     * worker id
     * @return int
     */
    public function worker() : int;

    /**
     * service name or app name
     * @return string
     */
    public function serviced() : string;

    /**
     * events registry
     * @return Events
     */
    public function events() : Events;

    /**
     * net local address
     * @return Address
     */
    public function local() : Address;

    /**
     * net remote address
     * @return Address
     */
    public function remote() : Address;
}
