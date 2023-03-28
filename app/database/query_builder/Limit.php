<?php

function limit(string|int $limit)
{
    global $query;
    
    if(isset($query['paginate'])){
        throw new Exception('O limit não pode ser chamado com a paginação');
    }

    $query['limit'] = true;
    $query['sql'] = "{$query['sql']} limit {$limit}";
}