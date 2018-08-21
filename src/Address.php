<?php
/**
 * Network address (host and port)
 * User: moyo
 * Date: 21/09/2017
 * Time: 5:52 PM
 */

namespace Carno\Net;

class Address
{
    /**
     * @var string
     */
    private $host = null;

    /**
     * @var int
     */
    private $port = null;

    /**
     * @var bool
     */
    private $valid = null;

    /**
     * Address constructor.
     * @param string $host
     * @param int $port
     */
    public function __construct(string $host, int $port = null)
    {
        if (is_null($port)) {
            if (is_numeric($sep = strpos($host, ':')) && !strstr($host, '://')) {
                // ("host:port")
                $port = substr($host, $sep + 1);
                $host = substr($host, 0, $sep) ?: '0.0.0.0';
            } elseif (is_numeric($host)) {
                // ("port")
                $port = $host;
                $host = '127.0.0.1';
            } else {
                // ("host")
                $port = -1;
            }
        }

        $this->host = $host;
        $this->port = $port;

        $this->valid = $this->host && is_numeric($this->port);
    }

    /**
     * @return string
     */
    public function host() : string
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function port() : int
    {
        return $this->port;
    }

    /**
     * @return bool
     */
    public function valid() : bool
    {
        return $this->valid;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%s:%d', $this->host, $this->port);
    }
}
