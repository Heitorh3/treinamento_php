<?php

function order(string $by, string $order = 'ASC')
{
    global $query;

    if (isset($query['limit'])) {
        throw new Exception('O order não pode vir depois do limit');
    }

    if (isset($query['paginate'])) {
        throw new Exception('O order não pode vir depois da paginação');
    }

    $query['order'] = true;
    $query['sql'] = "{$query['sql']} order by {$by} {$order}";
}
