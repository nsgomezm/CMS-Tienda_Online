<?php

namespace App\Http\Controllers\Dashboard;

use Session;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    protected function main(){
        $category_filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
        return view('dashboard.categories.list', ['filter' => $category_filter,'categories' => ($category_filter == 'all' ? Category::get() : Category::where('module',$category_filter)->get()) ]);
    }

    protected function create(Request $request){
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'module' => 'required|not_in:null',
            'type_icon' => 'required|not_in:null',
            'icon' => 'required'
        ]);


        if( (isset($_POST['id']) ) ? $_POST['id'] : false) {
            $category = Category::find($_POST['id']);
            $category->update($request->all());
            $category->save();

            Session::flash('message', 'Actulización correcta');
            return view('dashboard.categories.list', ['filter'=>'all', 'categories' => Category::where('id', $category->id)->get()]);
        }
        

        $category = new Category($request->all());
        $category->save();
        return back()->with('message', 'Categoria guardada, ok.');
    }

    protected function delete(Category $category = null){

        if($category){
            $category->delete();
        }
        
        Session::flash('delete', 'Se eliminó correctamente');
        return redirect( route('dashboard.categories') );
    }
}
