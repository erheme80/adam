<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('created_at','desc')->get();

        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        #dd($request->all());

        $validatedData = $request->validate([
            'name' =>'required|unique:categories|string|max:255',
            'slug' =>'required|unique:categories|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:10000',
            'status' => 'nullable'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categories/',$filename);
            $validatedData['image'] = 'uploads/categories/'.$filename;
        }
        else{
            $validatedData['image'] = null;
        }

        Category::query()->create([
            'name'=>$validatedData['name'],
            'slug'=>$validatedData['slug'],
            'image'=>$validatedData['image'],
            'status'=>$request->status==true ? 1 : 0,
        ]);

        return redirect()->route('admin.categories.index')->with('success','Category created successfully');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
