<?php
/**
 * Identify manager
 * User: moyo
 * Date: 21/11/2017
 * Time: 3:35 PM
 */

namespace Carno\Net\Chips\Endpoint;

use Ramsey\Uuid\Uuid;

trait Identify
{
    /**
     * @var string
     */
    private $identify = null;

    /**
     * @return string
     */
    public function id() : string
    {
        return $this->identify ?? $this->resetID()->id();
    }

    /**
     * @return self
     */
    public function resetID() : self
    {
        return $this->assignID(Uuid::uuid4()->toString());
    }

    /**
     * @param string $id
     * @return self
     */
    public function assignID(string $id) : self
    {
        $this->identify = $id;
        return $this;
    }
}
