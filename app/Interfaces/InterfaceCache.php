<?php

namespace app\Interfaces;

interface InterfaceCache
{
    public function set($key, $value);

    public function get($key);

    public function expire($key);

    public function incr($key);
}
