<?php
/**
 * Net connection
 * User: moyo
 * Date: 29/09/2017
 * Time: 12:14 PM
 */

namespace Carno\Net;

use Carno\Coroutine\Context;
use Carno\Net\Contracts\Conn;
use Carno\Net\Contracts\Server;

class Connection implements Conn
{
    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var int
     */
    protected $seq = 0;

    /**
     * @var Context
     */
    protected $ctx = null;

    /**
     * @var Address
     */
    protected $localA = null;

    /**
     * @var Address
     */
    protected $remoteA = null;

    /**
     * @var Server
     */
    protected $serverObj = null;

    /**
     * @var int
     */
    protected $workerID = -1;

    /**
     * @var string
     */
    protected $serviced = '';

    /**
     * @var Events
     */
    protected $netEvents = null;

    /**
     * Connection constructor.
     * @param Context $previous
     */
    public function __construct(Context $previous = null)
    {
        $this->ctx = $previous ?? new Context;
    }

    /**
     * @return Context
     */
    public function ctx() : Context
    {
        return $this->ctx;
    }

    /**
     * @param int $idx
     * @return static
     */
    public function setID(int $idx) : self
    {
        $this->id = $idx;
        return $this;
    }

    /**
     * @param int $idx
     * @return static
     */
    public function setSEQ(int $idx) : self
    {
        $this->seq = $idx;
        return $this;
    }

    /**
     * @param string $host
     * @param int $port
     * @return static
     */
    public function setLocal(string $host, int $port) : self
    {
        $this->localA = new Address($host, $port);
        return $this;
    }

    /**
     * @param string $host
     * @param int $port
     * @return static
     */
    public function setRemote(string $host, int $port) : self
    {
        $this->remoteA = new Address($host, $port);
        return $this;
    }

    /**
     * @param Server $instance
     * @return static
     */
    public function setServer(Server $instance) : self
    {
        $this->serverObj = $instance;
        return $this;
    }

    /**
     * @param int $id
     * @return static
     */
    public function setWorker(int $id) : self
    {
        $this->workerID = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return static
     */
    public function setServiced(string $name) : self
    {
        $this->serviced = $name;
        return $this;
    }

    /**
     * @param Events $events
     * @return static
     */
    public function setEvents(Events $events) : self
    {
        $this->netEvents = $events;
        return $this;
    }

    /**
     * @return int
     */
    public function id() : int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function seq() : int
    {
        return $this->seq;
    }

    /**
     * @return Address
     */
    public function local() : Address
    {
        return $this->localA;
    }

    /**
     * @return Address
     */
    public function remote() : Address
    {
        return $this->remoteA;
    }

    /**
     * @return Server
     */
    public function server() : Server
    {
        return $this->serverObj;
    }

    /**
     * @return int
     */
    public function worker() : int
    {
        return $this->workerID;
    }

    /**
     * @return string
     */
    public function serviced() : string
    {
        return $this->serviced;
    }

    /**
     * @return Events
     */
    public function events() : Events
    {
        return $this->netEvents;
    }
}
