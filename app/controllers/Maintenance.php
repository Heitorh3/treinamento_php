<?php

namespace app\Controllers;

class Maintenance
{
    public function index()
    {
        $data = [
            'title' => 'Manutenção',
            'subtitle' => 'Site em manutenção.',
            'description' => 'Pedimos desculpas pelos transtornos! Estamos em processo de manutenção, tente novamente mais tarde.',
        ];

        return ['view' => 'maintenance', 'data' => $data];
    }
}
