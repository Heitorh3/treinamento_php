<?php

namespace app\database;

use app\classes\Cache;
use app\classes\Redis;

class CacheRedis extends Cache
{
    public const TIME = '+1day';

    public function __construct($redis)
    {
        parent::__construct(new Redis($redis));
    }

    public function home($data)
    {
        $this->set('users', json_encode(
            $data
        ));

        $this->expire('users', self::TIME);

        // $this->set('produtos_destaque', json_encode(
        //     $this->produtoRepository->listarProdutosOrdenadosPeloDestaque(6))
        // );
        // $this->set('produtos_promocao', json_encode($this->produtoRepository->listarProdutosPromocao(6)));
        // $this->expire('produtos_destaque', self::TIME);
        // $this->expire('produtos_promocao', self::TIME);
    }
}
