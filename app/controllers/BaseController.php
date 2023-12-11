<?php

namespace app\controllers;

use app\traits\Cache;
use app\traits\View;

abstract class BaseController
{
    use View;
    use Cache;
}
