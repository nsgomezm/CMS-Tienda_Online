<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Produt;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutController extends Controller
{
    public function index(){
        return view('dashboard.products.list', ['products' => Produt::orderBy('id', 'desc')->with('category')->get() ]); /* orderBy('id', 'DESC') */
    }
    
    public function form(Produt $product = null){
        $compact = [
            'update' => ($product) ? true : false,
            'categories' => Category::where('module', 'productos')->get(),
            'product' => ($product) ? $product : null,
        ];
        return view('dashboard.products.form', $compact);
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|not_in:null',
            'price' => 'numeric|required|min:0',
            'descount' => 'numeric|min:0|max:2',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,svg'
        ]);

        $request->merge(['slug' => Str::slug($request->name), 'image' => $this->movePhoto($request)]);
        $product = new Produt($request->all());
        $product->save();

        return redirect()->route('dashboard.products.form', $product->id)->with('type_alert', 'success')->with('message', 'El registro se creó correctamente.');
    }

    public function update(Produt $product, Request $request){
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|not_in:null',
            'price' => 'numeric|required|min:0',
            'descount' => 'numeric|min:0|max:2',
            'description' => 'required',
            'img' => 'image|mimes:jpeg,jpg,png,svg'
        ]);

        $merge = [ 
            'slug' => Str::slug($request->name),
            'image' => ($request->hasFile('img')) ? $this->movePhoto($request) : $product->image
        ];
        $request->merge($merge);
        $product->update($request->all());
        $product->save();

        return redirect()->route('dashboard.products.form', $product->id)->with('type_alert', 'success')->with('message', 'El registro se actualizó correctamente.');
    }

    public function delete(Produt $product){
        $product->delete();
        return redirect()->route('dashboard.products')->with('type_alert', 'warning')->with('message', 'El registro se eliminó correctamente.');     
    }

    private function movePhoto($request){
        $name = null;
        
        if($request->hasFile('img')){
            $name = time().'.'.trim($request->file('img')->getClientOriginalExtension());
            $request->img->move( public_path('img/products'), $name);
        }
        return ($name) ? "img/products/$name" : 'img/noimage.png';
    }
}


