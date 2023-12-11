<?php

namespace app\traits;

use app\classes\bind;

trait Cache
{
    public function getCache()
    {
        return Bind::get('cache');
    }
}
