<?php

namespace App\Http\Controllers;

use App\Models\Cartegory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartegoryController extends Controller
{
    //cartegory view in cartegory index page
    public function index(Request $request)
    {
        $cartegoriess = Cartegory::orderBy('name')->get();
        return view('cartegory.admin_cartegory', compact('cartegoriess'));
    }

    //cartegory view on table 
    public function cartegory_data()
    {
        $cartegories = Cartegory::orderBy('created_at', 'desc')->paginate(10);
        return response()->json($cartegories);
    }

    //cartegory store data in darabase
    public function store(Request $request)
    {
          $request->validate([
            'name' => 'required|string|max:255|unique:cartegories,name',
            'parent_id' => 'nullable|exists:cartegories,id',
            'sort_order' => 'nullable|integer',
            'description' => 'nullable|string',
          ]);

          $cartegory = new Cartegory();
          $cartegory->name = $request->name;
          $cartegory->slug = Str::slug($request->name);
          $cartegory->parent_id = $request->parent_id ?? null;
          $cartegory->sort_order = $request->sort_order;
          $cartegory->description = $request->description;
          $cartegory->status = $request->has('status') ? 1 : 0;

          $cartegory->save();

          return response()->json(['success' => 'New Cartegory Added Successfully...']);
    }

    //edit cartegory on modal form
    public function edit($slug)
    {
         $cartegory = Cartegory::where('slug', $slug)->firstOrFail();
         return response()->json($cartegory);
    }

      //update cartegory
      public function update(Request $request , $slug)
      {

        $cartegory = Cartegory::where('slug', $slug)->firstOrFail();

    $request->validate([
        'name' => 'required|string|max:255|unique:cartegories,name,' . $cartegory->id,
        'parent_id' => 'nullable|exists:cartegories,id',
        'sort_order' => 'nullable|integer',
        'description' => 'nullable|string',
    ]);

    $cartegory->name = $request->name;
    $cartegory->parent_id = ($request->parent_id == $cartegory->id) ? null : $request->parent_id;
    $cartegory->sort_order = $request->sort_order;
    $cartegory->description = $request->description;
    $cartegory->status = $request->has('status') ? 1 : 0;

    $cartegory->save();

          return response()->json(['success' => 'Cartegory Updated Successfully...']);
      }

      //delete cartegory controller function
      public function destroy($id)
      {
        $cartegory = Cartegory::where('id', $id)->firstOrFail();
        $cartegory->delete();
        Product::where('category_id', '=', $id)->delete();
        return response()->json(['success' => 'Category deleted successllyy']);
      }

      //view specific category by slug controller function
      public function view($slug)
      {
        $cartegory = Cartegory::where('slug', $slug)->firstOrFail();
        return response()->json($cartegory);
      }

}
