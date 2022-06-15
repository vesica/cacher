# Deprecation Notice - June 2022

As the underlying PHP Cache library is now deprecated in favour of Symfony Cache (https://symfony.com/doc/current/components/cache.html), this library is no longer supported. Symfony cache simplifies a lot of the complexity much like this library did, and there's no good reason to maintain another one.

[![CircleCI](https://circleci.com/gh/vesica/cacher.svg?style=shield)](https://circleci.com/gh/vesica/cacher)
[![Latest Stable Version](https://poser.pugx.org/vesica/cacher/v/stable)](https://packagist.org/packages/vesica/cacher)
[![Total Downloads](https://poser.pugx.org/vesica/cacher/downloads)](https://packagist.org/packages/vesica/cacher)
[![License](https://poser.pugx.org/vesica/cacher/license)](https://packagist.org/packages/vesica/cacher)
[![Monthly Downloads](https://poser.pugx.org/vesica/cacher/d/monthly)](https://packagist.org/packages/vesica/cacher)
[![Daily Downloads](https://poser.pugx.org/vesica/cacher/d/daily)](https://packagist.org/packages/vesica/cacher)
[![composer.lock](https://poser.pugx.org/vesica/cacher/composerlock)](https://packagist.org/packages/vesica/cacher)

# Caching Made Easy

This is wrapper around the PHP cache/cache library (https://github.com/php-cache/cache) to simplify caching with just 2 lines.

This was originally written inside https://github.com/islamic-network/waf but is now used in various projects.

## Install it

```composer require vesica/cacher```

## Use it with Redis or Memcached
```
$cache = new \Vesica\Cacher\Redis($host, $port, $namespace);
// OR
$cache = new \Vesica\Cacher\Memcached($host, $port, $namespace);

$cache->set($key, $value);
$cache->get($key);
$cache->exists($key);
```
