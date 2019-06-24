# Caching Made Easy

This is wrapper around the PHP cache/cache library (https://github.com/php-cache/cache) to simplify caching with just 2 lines.

## Install it

```composer require vesica/cacher```

## Use it with Redis or Memcached
$cache = new \Vesica\Cacher\Redis($host, $port, $namespace);
// OR
$cache = new \Vesica\Cacher\Memcached($host, $port, $namespace);

$cache->set($key, $value);
$cache->get($key);
$cache->exists($key);