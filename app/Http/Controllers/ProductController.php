<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function list() {
        return view("lista_proizvoda", [
            "products" => Product::all(),
        ]);
    }

    public function add() {
        return view('product-create', [
            "categories" => Category::all()
        ]);
    }

       public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-show', compact('product'));
    }

    public function kategorija($category = null)
    {
        if ($category) {

            $products = Product::whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            })->get();
        } else {
            $products = Product::all();
        }

        return view('lista_proizvoda', compact('products'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:256',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->category_id = $request->input("category_id");
        $product->kolicina = $request->input("kolicina");

        if ($request->hasFile("image")) {
            $imageFile = $request->file("image");
            $imagePath = $imageFile->store("images", "public");
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('lista_proizvoda')->with("success", "Proizvod je uspešno sačuvan.");
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Proizvod je uspešno obrisan.');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product-edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:256',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->kolicina = $request->input('kolicina');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            // Obriši staru sliku ako postoji
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imageFile = $request->file('image');
            $imageName = time() . "." . $imageFile->getClientOriginalExtension();
            $imagePath = $imageFile->storeAs('product_images', $imageName, 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('lista_proizvoda')->with('success', 'Proizvod je uspešno izmenjen.');
    }



}

