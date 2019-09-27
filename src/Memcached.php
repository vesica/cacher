<?php
namespace Vesica\Cacher;

use Cache\Namespaced\NamespacedCachePool;
use Cache\Adapter\Memcached\MemcachedCachePool;
use Exception;

class Memcached extends Cacher
{
    /**
     * Memcached constructor.
     * @param $host
     * @param $port
     * @param string $nameSpaceExtension
     */
    public function __construct($host, $port, $nameSpaceExtension = '')
    {
        $memCached = new \Memcached();
        try {
            $memCached->addServer($host, $port);
            $this->cache = new NamespacedCachePool(new MemcachedCachePool($memCached), self::NAMESPACE . $nameSpaceExtension);
        } catch (Exception $e) {
            throw new Exception('Unable to Connect to Memcached: ' .  $e->getMessage());
        }
    }
}
