<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.admin-index', compact('products'));
    }


    /**
     * Edit product
     *
     * @return void
     */
    public function edit(Product $product)
    {

        return view('admin.admin-edit-product', [
            'product' => $product
        ]);
    }



    /**
     * Receive request for update - method PUT
     *
     * @return void
     */
    public function update(
        Product $product,
        ProductStoreRequest $request
    ) {
        $input = $request->validated();

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            Storage::delete($product->cover ?? '');
            $file = $input['cover'];
            $path = $file->store('product');
            $input['cover'] = $path;
        }

        $product->fill($input);
        $product->save();
        return Redirect::route('admin.products');
    }

    /**
     * Create product
     *
     * @return void
     */
    public function create()
    {
        return view('admin.admin-new-product');
    }


    /**
     * Receive request for create product - method POST
     *
     * @return void
     */
    public function store(ProductStoreRequest $request)
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            $file = $input['cover'];
            $path = $file->store('product');
            $input['cover'] = $path;
        } else {
            Storage::put('product/image.jpeg', 'Contents');
        }

        Product::create($input);

        return Redirect::route('admin.products');
    }

    /**
     * Receive request for delete product
     *
     * @return void
     */
    public function destroy(
        Product $product,
    ) {
        $product->delete();
        Storage::delete($product->cover ?? '');
        return Redirect::route('admin.products');
    }

    /**
     * Receive request for delete product
     *
     * @return void
     */
    public function destroyImage(
        Product $product,
    ) {
        Storage::delete($product->cover);
        $product->cover = null;
        $product->save();
        return Redirect::back();
    }
}
