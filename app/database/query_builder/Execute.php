<?php

function execute(bool $isFetchAll = true, bool $isRowCount = false)
{
    global $query;

    try {
        $connect = connect();

        if (!isset($query['sql'])) {
            throw new Exception('Precisa ter o sql para executar a query');
        }

        $prepare = $connect->prepare($query['sql']);
        $prepare->execute($query['execute'] ?? []);

        if ($isRowCount) {
            $query['count'] = $prepare->rowCount();

            return $query['count'];
        }

        if ($isFetchAll) {
            return (object) [
                'rows' => $prepare->fetchAll() ?? $prepare->rowCount(),
                'count' => $query['count'],
            ];
        }

        return $prepare->fetch();
    } catch (Exception $e) {
        $error = [
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'message' => $e->getMessage(),
            'sql' => $query['sql'],
        ];

        ds($error);
    }
}
