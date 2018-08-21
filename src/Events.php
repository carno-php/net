<?php
/**
 * Net events
 * User: moyo
 * Date: 02/08/2017
 * Time: 12:04 PM
 */

namespace Carno\Net;

use Carno\Net\Contracts\Conn;

class Events
{
    /**
     * @var callable[][]
     */
    private $observers = [];

    /**
     * @param int $evk
     * @return bool
     */
    public function has(int $evk) : bool
    {
        return isset($this->observers[$evk]);
    }

    /**
     * @return string[]
     */
    public function keys() : array
    {
        return array_keys($this->observers);
    }

    /**
     * @param int $evk
     * @param callable[] $observers
     * @return self
     */
    public function attach(int $evk, callable ...$observers) : self
    {
        $this->has($evk)
            ? array_push($this->observers[$evk], ...$observers)
            : $this->observers[$evk] = $observers
        ;
        return $this;
    }

    /**
     * @param int $evk
     * @param Conn $conn
     */
    public function notify(int $evk, Conn $conn) : void
    {
        if ($this->has($evk)) {
            array_map(static function (callable $observer) use ($conn) {
                $observer($conn);
            }, $this->observers[$evk]);
        }
    }
}
