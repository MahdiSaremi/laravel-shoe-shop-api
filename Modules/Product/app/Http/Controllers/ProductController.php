<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Product\Models\Product;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Transformers\ProductCollection;
use Modules\Product\Transformers\ProductResource;

class ProductController extends Controller
{

    public function __construct(
        public ProductRepository $productRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductCollection($this->productRepository->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'group_id'    => ['nullable', 'exists:groups,id'],
            'image_id'    => ['nullable', 'exists:images,id'],
            'name'        => ['required', 'string', 'min:3', 'max:20'],
            'code'        => ['required', 'string', 'max:6'],
            'description' => ['required', 'string'],
            'features'    => ['required', 'string'],
            'price'       => ['required', 'integer'],
            'slug'        => ['required', 'string', 'unique:products,slug'],
        ]);

        $product = $this->productRepository->create($data);

        return new ProductResource($product);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return new ProductResource($this->productRepository->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = $this->productRepository->findOrFail($id);

        $data = $request->validate([
            'group_id'    => ['nullable', 'exists:groups,id'],
            'image_id'    => ['nullable', 'exists:images,id'],
            'name'        => ['nullable', 'string', 'min:3', 'max:20'],
            'code'        => ['nullable', 'string', 'max:6'],
            'description' => ['nullable', 'string'],
            'features'    => ['nullable', 'string'],
            'price'       => ['nullable', 'integer'],
            'slug'        => ['nullable', 'string', 'unique:products,slug,'.$this->id],
            'discount'    => ['nullable', 'numeric', 'min:0', 'max:100'],
        ]);

        $product->update($data);

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findOrFail($id);

        $product->delete();

        return response()->json(true);
    }
}
