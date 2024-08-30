<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'=>'required|exists:categories,id',
            'brand_id'=>'required|exists:brands,id',
            'name'=>'required|string',
            'slug'=>'required|unique:products,slug',
            'description'=>'required|string',
            'thumbnail'=>'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'price'=>'required|numeric',
            'sale_percent'=>'required|numeric|min:0|max:100',
            'quantity'=>'required|numeric|min:0',
            'trending'=>'nullable',
            'status'=>'nullable',
            'image.*'=>'required|image|max:2048'
        ];
    }
}
