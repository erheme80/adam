<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy('created_at','desc')->get();

        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.create',compact('categories', 'brands'));
    }

    public function store(ProductFormRequest $request)
    {
        // dd($request->validated());

        $validatedData = $request->validate();

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/products/thumbnail/'.$filename);
            $validatedData['thumbnail'] = 'uploads/products/thumbnail/'.$filename;
        }
        else{
            $validatedData['thumbnail'] = null;
        }
        $product = Product::query()->create([
            'category_id' => $validatedData['category_id'],
            'brand_id' => $validatedData['brand_id'],
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'thumbnail' => $validatedData['thumbnail'],
            'price' => $validatedData['price'],
            'sale_percent' => $validatedData['sale_percent'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
        ]);

    }
    public function image($id){
        $prodct = Product::query()->findOrFail($id);

        return view('admin.product.image', compact('product'));
    }
}
