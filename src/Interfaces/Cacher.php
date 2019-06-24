<?php
namespace Vesica\Cacher\Interfaces;

/**
 * Interface Cacher
 * @package Vesica\Cacher\Interfaces
 */
interface Cacher
{
    const NAMESPACE = 'Vesica';
    public function set($key, $value);
    public function get($key);
    public function exists($key);
}
