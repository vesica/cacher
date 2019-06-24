<?php
namespace Vesica\Cacher;

use Cache\Namespaced\NamespacedCachePool;
use Cache\Adapter\Redis\RedisCachePool;
use Vesica\Cacher\Cacher;

class Redis extends Cacher
{
    /**
     * Namespaced cached pool object
     * @var Object
     */
    private $cache;
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
            throw new Exception('Unable to Connect to Memcached', $e->getMessage());
        }
    }
}
