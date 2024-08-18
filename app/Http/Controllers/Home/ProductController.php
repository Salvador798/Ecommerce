<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function details($id)
    {
        $data = Product::find($id);

        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }
        return view('home.Product.details', compact('data', 'count'));
    }
}
