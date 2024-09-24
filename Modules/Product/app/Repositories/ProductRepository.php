<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Product;

class ProductRepository
{

    public function getRating(Product $product)
    {
        if (!$count = $product->ratings()->count())
        {
            return 0;
        }

        return round($product->ratings()->sum('rating') / $count, 2);
    }

}
