<?php

$query = [];

// query builder
require 'query_builder/Read.php';
require 'query_builder/Limit.php';
require 'query_builder/Order.php';
require 'query_builder/Where.php';
require 'query_builder/Paginate.php';
require 'query_builder/Join.php';
require 'query_builder/Search.php';
require 'query_builder/Execute.php';

// no query builder
require 'no_query_builder/Read.php';
require 'no_query_builder/Delete.php';
require 'no_query_builder/Update.php';
require 'no_query_builder/Create.php';
