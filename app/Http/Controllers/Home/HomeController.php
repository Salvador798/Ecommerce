<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = Product::all();

        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }
        return view('home.index', compact('data', 'count'));
    }

    public function home()
    {
        $data = Product::all();

        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }
        return view('home.index', compact('data', 'count'));
    }

    public function shop()
    {
        $data = Product::all();

        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }
        return view('home.Access.shop', compact('data', 'count'));
    }

    public function why()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }
        return view('home.Access.why', compact('count'));
    }

    public function testimonial()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }
        return view('home.Access.testimonial', compact('count'));
    }

    public function contact()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }
        return view('home.Access.contact', compact('count'));
    }
}
