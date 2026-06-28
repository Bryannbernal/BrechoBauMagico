<?php

namespace Database\Seeders;

use App\Models\Roupa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoupaSeeder extends Seeder
{
    public function run(): void
    {
        Roupa::create([
            'tipo' => 'Camisa',
            'foto' => 'download.jfif',
            'marca' => 'Gucci',
            'tamanho' => 'M',
            'situacao' => 1,
            'preco' => 20.00
        ]);
    }
}
