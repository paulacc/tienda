<?php

Namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Image;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('name')->paginate(3);


    	return view('admin.products.index', ['products' => $products]);
    }

    public function show(Product $product)
    {
    	return view('admin.products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
    	$categories = Category::orderBy('name')->get();
    	$tags = Tag::orderBy('name')->get();

    	$data = [
    		'product' => $product,
    		'categories' => $categories,
    		'tags' => $tags
    	];
    	return view('admin.products.edit', $data);
    }

    public function update(ProductRequest $request, Product $product)
    {
    	$product->update($request->all());

    	$product->tags()->sync($request->input('tags'));

    	$this->addImages($product);

    	session()->flash('message', 'El producto se editó con éxito');

    	return redirect('admin/products');
    }

    public function destroy(Product $product)
    {
    	$product->delete();

    	session()->flash('message', 'El producto se eliminó con éxito.');

    	return redirect('admin/products');
    }

    private function addImages($product)
    {
    	if (request()->hasFile('images')) {
    		foreach (request()->file('images') as $file) {
    			$src = $file->store('products');
    			Image::create([
    				'src' => $src,
    				'product_id' => $product->id
    			]);
    		}
    	}
    }
}
