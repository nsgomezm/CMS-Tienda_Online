<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Produt;

class GalleryController extends Controller
{
    public function index(Produt $product){
        $product =  $product->load('photos');

        return view('dashboard.products.gallery', compact('product'));
    }

    public function store(Produt $product, Request $request){

        $request->validate([
            'img' => 'required|image|mimes:jpeg,jpg,png,svg'
        ]);
        $name = time().'.'.trim($request->file('img')->getClientOriginalExtension());
        $request->img->move( public_path('img/gallery/'), $name);

        $request->merge([
            'image' => "img/gallery/$name",
            'product_id' => $product->id
        ]);
        
        $gallery = new Gallery($request->all());
        $gallery->save();

        return redirect()->route('dashboard.products.gallery', $product->id)->with('type_alert', 'success')->with('message', "La imagen fue asociada correctamente al producto $product->name.");
    }

    public function delete($id, Gallery $gallery){
        $gallery->delete();
        return redirect()->route('dashboard.products.gallery', $id)->with('type_alert', 'warning')->with('message', "La imagen fue eliminada correctamente.");
    }
}
