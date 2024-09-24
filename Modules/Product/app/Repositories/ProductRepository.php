<?php

namespace Modules\Product\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Product\Models\Product;

class ProductRepository
{

    public function findOrFail($id): Product
    {
        return Product::findOrFail($id);
    }

    public function paginate(): LengthAwarePaginator
    {
        return Product::paginate();
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function getRating(Product $product)
    {
        if (!$count = $product->ratings()->count())
        {
            return 0;
        }

        return round($product->ratings()->sum('rating') / $count, 2);
    }

}
