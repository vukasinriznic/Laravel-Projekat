<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProizvodController extends Controller
{
    public function list() {
        return view("katalog", [
            "products" => Product::all(),
        ]);
    }

    public function index($category = null)
    {
        if ($category) {
            $products = Product::whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            })->get();
        } else {
            $products = Product::all();
        }

        return view('katalog', compact('products'));
    }

    public function welcome(Request $request)
        {
            $query = Product::with('category');

            if ($request->has('kategorija')) {
                $query->whereHas('category', function ($q) use ($request) {
                    $q->where('name', $request->kategorija);
                });
            }

            $products = $query->get();

            return view('welcome', compact('products'));
        }

    public function show($id)
    {
        $product = Product::findOrFail($id); // Pronađi proizvod po ID-u
        return view('proizvodi.show', compact('product'));
    }

    public function lista()
    {
        $user = Auth::user();

        if ($user && $user->role && $user->role->name === 'User') {
            abort(403, 'Nemate dozvolu da pristupite ovoj stranici.');
        }
        
        $products = Product::with('category')->get();
        return view('lista_proizvoda', compact('products'));
    }

}