<?php
/**
 * Address test
 * User: moyo
 * Date: 2018/8/21
 * Time: 12:07 PM
 */

namespace Carno\Net\Tests;

use Carno\Net\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testConstruct()
    {
        $tests = [
            [['127.0.0.1', 8080], '127.0.0.1', 8080],
            [['127.0.0.1:8081'], '127.0.0.1', 8081],
            [[':8083'], '0.0.0.0', 8083],
            [['8084'], '127.0.0.1', 8084],
            [['proto://'], 'proto://', -1],
        ];

        foreach ($tests as $test) {
            [$args, $host, $port] = $test;
            $addr = new Address(...$args);
            $this->assertEquals($host, $addr->host());
            $this->assertEquals($port, $addr->port());
        }
    }
}
