<?php

namespace idk\yii2\botman;

use BotMan\BotMan\Interfaces\CacheInterface;
use Yii;
use yii\base\Component;

/**
 * Class Cache
 *
 * @property \yii\caching\CacheInterface cache
 * @package idk\yii2\botman
 */
class Cache extends Component implements CacheInterface
{

	/**
	 * Determine if an item exists in the cache.
	 *
	 * @param  string $key
	 * @return bool
	 */
	public function has($key)
	{
		return $this->cache->exists($key);
	}

	/**
	 * Retrieve an item from the cache by key.
	 *
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		$value = $this->cache->get($key);
		return ($value === false) ? $default : $value;
	}

	/**
	 * Retrieve an item from the cache and delete it.
	 *
	 * @param  string $key
	 * @param  mixed $default
	 * @return mixed
	 */
	public function pull($key, $default = null)
	{
		$value = $this->get($key, $default);
		$this->cache->delete($key);
		return $value;
	}

	/**
	 * Store an item in the cache.
	 *
	 * @param  string $key
	 * @param  mixed $value
	 * @param  \DateTime|int $minutes
	 * @return void
	 */
	public function put($key, $value, $minutes)
	{
		if ($minutes instanceof \Datetime) {
			$seconds = $minutes->getTimestamp() - time();
		} else {
			$seconds = $minutes * 60;
		}
		$this->cache->set($key, $value, $seconds);
	}

	/**
	 * Gets the cache storage
	 *
	 * @return \yii\caching\CacheInterface
	 */
	public function getCache()
	{
		/** @noinspection ExceptionsAnnotatingAndHandlingInspection */
		/** @var  \yii\caching\CacheInterface $specificCache */
		$specificCache = Yii::$app->get('botmanCache', false);
		return $specificCache ?: Yii::$app->cache;
	}
}