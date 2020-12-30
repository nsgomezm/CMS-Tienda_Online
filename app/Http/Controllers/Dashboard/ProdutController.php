<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Produt;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutController extends Controller
{
    public function form(){
        $categories = Category::where('module', 'productos')->get();
        return view('dashboard.products.form', compact('categories'));
    }


    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|not_in:null',
            'price' => 'numeric|required|min:0',
            'description' => 'required'
        ]);

        if($request->hasFile('img')){
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $request->img->move( public_path('img/products'), time().'.'.$fileExt);
            $request->merge(['image' => 'img/products.'.$fileExt ]);
        }
        $request->merge(['slug' => Str::slug($request->name)]);
        $product = new Produt($request->all());
        $product->save();

        return redirect()->route('dashboard.products');
    }
}
