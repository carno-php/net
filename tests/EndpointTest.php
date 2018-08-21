<?php
/**
 * Endpoint test
 * User: moyo
 * Date: 2018/8/21
 * Time: 1:47 PM
 */

namespace Carno\Net\Tests;

use Carno\Net\Address;
use Carno\Net\Endpoint;
use PHPUnit\Framework\TestCase;

class EndpointTest extends TestCase
{
    private const UUID_REGEX = '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/';

    public function testAPIs()
    {
        $ep = new Endpoint($addr = new Address(9000));

        $ep
            ->relatedService($service = 'test-app')
            ->setOptions(['opt1' => 'val'])
            ->setTags('tag1', 'tag3')
        ;

        $this->assertEquals($addr, $ep->address());

        $this->assertEquals(1, preg_match(self::UUID_REGEX, $ep->id()));
        $this->assertEquals($service, $ep->service());
        $this->assertEquals('val', $ep->option('opt1'));
        $this->assertTrue($ep->hasTags('tag1', 'tag3'));
        $this->assertTrue($ep->hasTags('tag1'));
        $this->assertFalse($ep->hasTags('tag2'));

        $ep->setTags('tag2');

        $this->assertEquals(['tag1', 'tag3', 'tag2'], $ep->getTags());

        $ep->assignID('identify');

        $this->assertEquals('test-app$identify$127.0.0.1:9000$tag1,tag3,tag2', (string) $ep);
    }

    public function testAddrDesensitization()
    {
        $ep = new Endpoint(new Address('mysql://root:pwd@localhost'));

        $this->assertEquals('unspecified$id$mysql://root:***@localhost:-1$', (string) $ep);
    }
}
