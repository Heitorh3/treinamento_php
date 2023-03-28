<?php
function read(string $table, string $fields = '*')
{

    global $query;

    $query = [];

    $query['execute'] = [];
    $query['read'] = true;
    $query['table'] = $table;
    $query['sql'] = "SELECT {$fields} FROM {$table}";

}