<?php
namespace Vesica\Cacher;

use Cache\Namespaced\NamespacedCachePool;
use Cache\Adapter\Redis\RedisCachePool;
use Exception;

class Redis extends Cacher
{
    /**
     * Memcached constructor.
     * @param $host
     * @param $port
     * @param string $nameSpaceExtension
     */
    public function __construct($host, $port, $nameSpaceExtension = '')
    {
        $redis = new \Redis();
        try {
            $redis->connect($host, $port);
            $this->cache = new NamespacedCachePool(new RedisCachePool($redis), self::NAMESPACE . $nameSpaceExtension);
        } catch (Exception $e) {
            throw new Exception('Unable to Connect to Redis: ' . $e->getMessage());
        }
    }
}
