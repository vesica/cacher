<?php
namespace Vesica\Cacher;

use Cache\Namespaced\NamespacedCachePool;
use Cache\Adapter\Memcached\MemcachedCachePool;
use Vesica\Cacher\Interfaces\Cacher as CacherInterface;

class Cacher implements CacherInterface
{
    /**
     * Namespaced cached pool object
     * @var Object
     */
    protected $cache;

    /**
     * @param string $k Key
     * @param string $v Value
     * @return bool
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function set($k, $v, $ttl = 86400): bool
    {
        $item = $this->cache->getItem($k);
        $item->set($v);
        $item->expiresAfter((int) $ttl); //1 day
        return $this->cache->save($item);
    }
    /**
     * @param $k
     * @return mixed
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function get($k)
    {
        $item = $this->cache->getItem($k);
        return $item->get();
    }
    /**
     * Checks if a key exists
     * @param string $k Key
     * @return bool
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function exists($k): bool
    {
        return $this->cache->hasItem($k);
    }
}
