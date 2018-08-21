<?php
/**
 * Network endpoint (advanced features)
 * User: moyo
 * Date: 22/09/2017
 * Time: 6:19 PM
 */

namespace Carno\Net;

use Carno\Net\Chips\Endpoint\Identify;
use Carno\Net\Chips\Endpoint\Naming;
use Carno\Net\Chips\Endpoint\Options;
use Carno\Net\Chips\Endpoint\Printable;
use Carno\Net\Chips\Endpoint\Tagging;

class Endpoint
{
    use Identify, Naming, Tagging, Options, Printable;

    /**
     * @var Address
     */
    private $address = null;

    /**
     * Endpoint constructor.
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @return Address
     */
    public function address() : Address
    {
        return $this->address;
    }
}
