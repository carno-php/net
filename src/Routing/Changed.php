<?php
/**
 * Routing changed
 * User: moyo
 * Date: 2018/11/22
 * Time: 4:48 PM
 */

namespace Carno\Net\Routing;

use Carno\Net\Endpoint;

class Changed
{
    /**
     * @var int
     */
    private $evs = null;

    /**
     * @var Endpoint
     */
    private $node = null;

    /**
     * Changed constructor.
     * @param int $evs
     * @param Endpoint $node
     */
    public function __construct(int $evs, Endpoint $node)
    {
        $this->evs = $evs;
        $this->node = $node;
    }

    /**
     * @return bool
     */
    public function joined() : bool
    {
        return $this->evs === Events::JOIN;
    }

    /**
     * @return bool
     */
    public function leaved() : bool
    {
        return $this->evs === Events::LEAVE;
    }

    /**
     * @return Endpoint
     */
    public function target() : Endpoint
    {
        return $this->node;
    }
}
