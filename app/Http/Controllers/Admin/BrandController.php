<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::query()->orderBy('created_at','desc')->get();

        return view('admin.brand.index',compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $validatedData = $request->validate([
            'name'=>'required|unique:brands|string|max:255',
            'image'=>'required|image|mimes:jpeg,jpg,png,gif|max:10000',
            'status'=>'nullable'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/brands/',$filename);
            $validatedData['image'] = 'uploads/brands/'.$filename;
        }
        else{
            $validatedData['image']= null;
        }

        Brand::query()->create([
            'name'=>$validatedData['name'],
            'image'=>$validatedData['image'],
            'status'=>$request->status==true ? 1 : 0,
        ]);

        return redirect()->route('admin.brands.index')->with('success','Brand createdd successfully');
    }

    public function edit($id)
    {

        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }
}
