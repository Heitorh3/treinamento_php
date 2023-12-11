<?php

namespace app\classes;

use app\Interfaces\InterfaceCache;

class Cache
{
    private $cache;

    public function __construct(InterfaceCache $cache)
    {
        $this->cache = $cache;
    }

    public function get($key)
    {
        return $this->cache->get($key);
    }

    public function set($key, $cache)
    {
        $this->cache->set($key, $cache);
    }

    public function expire($key)
    {
        return $this->cache->expire($key);
    }

    public function incr($key)
    {
        return $this->cache->incr($key);
    }
}
