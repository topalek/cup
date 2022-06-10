<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateEmptyProduct extends Command
{
    protected $signature = 'product:empty';
    protected $description = 'Создать путой товар "Другой товар"';

    public function handle()
    {
        if (!Product::where('url', 'other')->exists()) {
            Product::Create([
                'name'           => 'Другой товар',
                'description'    => 'Другой товар',
                'url'            => 'other',
                'price_per_unit' => 0,
                'price_full'     => 0,
                'composition'    => '<p>Другой товар</p>',
                'active'         => false,
            ]);
        }
        return 0;
    }
}
