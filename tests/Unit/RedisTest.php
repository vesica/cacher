<?php

namespace Vesica\Cacher\Tests\Unit;

use Vesica\Cacher\Redis;

class RedisTest extends \PHPUnit\Framework\TestCase
{
    public function testDefault()
    {
        $rc = new Redis('127.0.0.1', 6379);
        $rc->set('one', 'yes');
        $this->assertEquals('yes', $rc->get('one'));
        $this->assertFalse($rc->exists('five'));
        $this->assertTrue($rc->exists('one'));
        $this->assertNotEquals('newValue', $rc->get('one'));
        $rc->set('one', 'happiness');
        $this->assertEquals('happiness', $rc->get('one'));
        $this->assertNotEquals('yes', $rc->get('one'));
        $rc2 = new Redis('127.0.0.1', 6379, 'test');
        $this->assertFalse($rc2->exists('one'));
        $rc2->set('one', 'NO');
        $this->assertEquals('NO', $rc2->get('one'));
        $this->assertEquals('happiness', $rc->get('one'));
    }
}