<?php
/**
 * Events test
 * User: moyo
 * Date: 2018/8/21
 * Time: 12:21 PM
 */

namespace Carno\Net\Tests;

use Carno\Net\Connection;
use Carno\Net\Contracts\Conn;
use Carno\Net\Events;
use PHPUnit\Framework\TestCase;

class EventsTest extends TestCase
{
    public function testBase()
    {
        $evk = 123;

        $v1 = $v2 = null;

        $ev = new Events;

        $ev->attach($evk, function (Conn $c) use (&$v1) {
            $v1 = $c->id();
        }, function (Conn $c) use (&$v2) {
            $v2 = $c->id();
        });

        $this->assertTrue($ev->has($evk));

        $this->assertEquals([$evk], $ev->keys());

        $ev->notify($evk, (new Connection)->setID($idx = 456));

        $this->assertEquals($idx, $v1);
        $this->assertEquals($v1, $v2);
    }
}
