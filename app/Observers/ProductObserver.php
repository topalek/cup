<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function deleting(Product $product){
        $product->hero()->delete();
        //$product->attachment()->each->delete();
    }
}
