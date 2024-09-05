<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::paginate();
    }

    public function show($id)
    {
        return Product::query()->findOr($id, callback: fn() => abort(404, "Product not found"));
    }

}
