<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::paginate(3);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;

        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added Successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Search the specified resource.
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $data = Product::where('title', "LIKE", '%' . $search . '%')->orWhere('category', "LIKE", '%' . $search . '%')->paginate(3);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $data = Product::where('slug', $slug)->get()->first();
        $category = Category::all();
        return view('admin.product.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        $image_path = public_path('products/' . $data->image);

        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $data->delete();
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated Successfully.');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/' . $data->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Deleted Successfully.');
        return redirect()->back();
    }
}
