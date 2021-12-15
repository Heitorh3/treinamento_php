<?php

namespace app\Controllers;

class Maintenance {
    public function index()
    {
$data = [
          'title' => 'Manutenção',
          'subtitle' => 'Site em manutenção.',
          'description' => 'Site em processo de manutenção.'
      ];

      return ['view'=>'maintenance', 'data'=> $data];
    }
}