<?php

namespace App\Http\Controllers;

use App\Models\Cartegory;
use App\Models\Product;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Flysystem\StorageAttributes;
use Symfony\Component\HttpFoundation\File\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Cartegory::where('status', 1)->pluck('name', 'id');
        return view('product.admin_product', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'    => 'required|string|max:255|unique:products,product_name',
            'category_id'     => 'required|exists:cartegories,id',
            'image'           => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'product_code'    => 'nullable|string|max:100',
            'brand'           => 'nullable|string|max:100',
            'purchase_price' => 'nullable|numeric|min:0',
            'selling_price'  => 'required|numeric|min:0',
            'discount'        => 'nullable|numeric|min:0',
            'stock'           => 'nullable|integer|min:0',
            'description'    => 'nullable|string',
        ]);

        $image_path = null;
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'product_name'    => $request->product_name,
            'category_id'     => $request->category_id,
            'slug'            => Str::slug($request->product_name),
            'image'           => $image_path,
            'product_code'    => $request->product_code,
            'brand'           => $request->brand,
            'purchase_price' => $request->purchase_price ?? 0,
            'selling_price'  => $request->selling_price,
            'discount'        => $request->discount ?? 0,
            'stock'           => $request->stock ?? 0,
            'description'    => $request->description,
            'status'          => $request->has('status') ? 1 : 0,
        ]);

        return response()->json([
            'message' => 'New Product Added Successfully'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show($slug, Request $request)
    {
            
            $product = Product::where('slug', $slug)->firstOrFail();
            return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $request->validate([
            'product_name'    => 'required|string|max:255',
            'category_id'     => 'required|integer',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'product_code'    => 'nullable|string|max:100',
            'brand'           => 'nullable|string|max:100',
            'purchase_price' => 'nullable|numeric|min:0',
            'selling_price'  => 'nullable|numeric|min:0',
            'discount'        => 'nullable|numeric|min:0',
            'stock'           => 'nullable|integer|min:0',
            'description'    => 'nullable|string',
        ]);

        //image update optional
        if ($request->hasFile('image')) {
            //delete old image
           /*  if ($product->image && 
            Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image); */
           /*  } */
            //store new image
            $product->image = $request->file('image')->store('products', 'public');
        } 

        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->slug = Str::slug($request->product_name);
        $product->product_code = $request->product_code;
        $product->brand = $request->brand;
        $product->selling_price = $request->selling_price ?? 0;
        $product->discount = $request->discount ?? 0;
        $product->stock = $request->stock ?? 0;
        $product->description = $request->description;
        $product->status = $request->has('status') ? 1 : 0;

        $product->save();


        return response()->json([
            'success' => 'Product Updated Successfully.....'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $product = Product::find($id);

        //delete image file as data is deleted
        /*  if($product->image && Storage::disk('products','public')->exists($product->image))
        {
            Storage::disk('products','public')->delete($product->image);
        }  */

               $image_path = public_path('products/'.$product->image);
                 if(file_exists($image_path))
                 {
                  unlink($image_path);
                 }

        $product->delete();

        return response()->json(['success' => 'Product Deleted Successfully....']);
    }

    //display product in tablelar form
    public function fetchProduct()
    {
        $products = Product::with('cartegories')->paginate(10);
        return response()->json($products);
    }
}
