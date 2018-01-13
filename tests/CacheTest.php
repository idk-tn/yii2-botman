<?php

namespace idk\yii2\botman\tests;

use PHPUnit\Framework\TestCase;
use idk\yii2\botman\Cache;

class CacheTest extends TestCase
{
    public $cache;

    public function setUp()
	{
		$this->cache = new Cache();
	}

	/** @test */
	public function get_non_existing_value()
	{
		$this->assertEquals('defaultVal', $this->cache->get('test_default_val', 'defaultVal'));
	}

	/** @test */
	public function put()
	{
		$this->cache->put('test_put', 'bar', 1);
		$this->assertEquals('bar', $this->cache->get('test_put', 'defaultVal'));
	}

	/** @test */
	public function has()
	{
		$this->cache->put('test_has', 'bar', 1 / 60);
		$this->assertTrue($this->cache->has('test_has'));
		sleep(1);
		$this->assertFalse( $this->cache->has('test_has'));
	}

	/** @test */
	public function expires()
	{
		$this->cache->put('test_expire', 'ok', 1 / 60);
		$this->assertEquals('ok', $this->cache->get('test_expire', 'nok'));
		sleep(1);
		$this->assertEquals('nok', $this->cache->get('test_expire', 'nok'));
	}

}
