<?php

session_start();

require '../vendor/autoload.php';

Sentry\init(['dsn' => SENTRY_DSN]);