<?php
/**
 * Routing table
 * User: moyo
 * Date: 2018/11/22
 * Time: 4:52 PM
 */

namespace Carno\Net\Routing;

use Carno\Net\Endpoint;

class Table
{
    /**
     * @var Endpoint[]
     */
    private $current = [];

    /**
     * @param Endpoint ...$presents
     * @return Changed[]
     */
    public function reset(Endpoint ...$presents) : array
    {
        $changes = [];

        $current = [];

        foreach ($presents as $endpoint) {
            $current[$epn = $endpoint->id()] = $endpoint;

            // if exists
            if (isset($this->current[$epn])) {
                unset($this->current[$epn]);
                continue;
            }

            // mark join
            $changes[] = new Changed(Events::JOIN, $endpoint);
        }

        if ($this->current) {
            foreach ($this->current as $endpoint) {
                // mark leave
                $changes[] = new Changed(Events::LEAVE, $endpoint);
            }
        }

        $this->current = $current;

        return $changes;
    }
}
