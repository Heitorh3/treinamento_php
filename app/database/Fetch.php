<?php
//query builder

$query = [];

function read(string $table, string $fields = '*')
{

    global $query;
    $query['execute'] = [];
    $query['read'] = true;
    $query['sql'] = "SELECT {$fields} FROM {$table}";

}

function limit(string|int $limit)
{
    global $query;
    
    if(isset($query['paginate'])){
        throw new Exception('O limit não pode ser chamado com a paginação');
    }

    $query['limit'] = true;
    $query['sql'] = "{$query['sql']} limit {$limit}";
}

function order(string $by, string $order = 'ASC')
{
    global $query;

    if(isset($query['limit'])){
        throw new Exception('O order não pode vir depois do limit');
    }

    if(isset($query['paginate'])){
        throw new Exception('O order não pode vir depois da paginação');
    }
    
    $query['order'] = true;
    $query['sql'] = "{$query['sql']} order by {$by} {$order}";
}

function paginate(string|int $perPage = 10){
    global $query;

    if(isset($query['limit'])){
        throw new Exception('A paginação não pode ser chamada com o limit');
    }


    $query['paginate'] = true;
}

function where(string $field, string $operator, string|int $value)
{

    global $query;

    if(!isset($query['read'])){
        throw new Exception('Antes de chamar o where chame o read');
    }

    if(func_num_args() != 3){
        throw new Exception('O where precisa de 3 parâmetros');
    }
    
    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]);
    $query['sql'] = "{$query['sql']} WHERE {$field} {$operator} :{$field}";
}

function orWhere(string $field, string $operator, string|int $value, string $typeWhere = 'or')
{

    global $query;

    if(!isset($query['read'])){
        throw new Exception('Antes de chamar o where chame o read');
    }

    if(!isset($query['where'])){
        throw new Exception('Antes de chamar o orWhere chame o where');
    }

    if(func_num_args() < 3 or func_num_args() > 4){
        throw new Exception('O where precisa de 3 ou 4 parâmetros');
    }
    
    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]);
    $query['sql'] = "{$query['sql']} {$typeWhere} {$field} {$operator} :{$field}";
}

function execute()
{
    global $query;

    $connect = connect();

    $prepare = $connect->prepare($query['sql']);
    $prepare->execute($query['execute'] ?? []);

    return $prepare->fetchAll();
}

function all($table, $fields = '*')
{
    try {
        $connect = connect();

        $query = $connect->query("select {$fields} from {$table}");
        
        return $query->fetchAll();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

function findBy($table, $field, $value, $fields = '*')
{
    try {
        $connect = connect();
        $prepare = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
        $prepare->execute([
            $field => $value
        ]);

        return $prepare->fetch();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}