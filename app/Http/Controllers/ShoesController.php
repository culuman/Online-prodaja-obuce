<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoes;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ShoesController extends Controller
{
    public function index()
    {

      $all_shoes = new Shoes();

      if(isset(request()->cat)){
        $all_shoes = Shoes::whereHas('category', function($query){
          $query->whereName(request()->cat);
        });
      }

      if(isset(request()->type)){
        $type = (request()->type == 'lower') ? 'asc' : 'desc';
        $all_shoes = $all_shoes->orderBy('price', $type);
      }

      $all_shoes = $all_shoes->get();
      $categories = Category::all();
      return view('welcome', compact('all_shoes', 'categories'));
    }

    public function oglas($id)
    {
      $oglas = Shoes::find($id);
      return view('oglas', compact('oglas'));
    }

    public function edit($id)
    {
      $shoes = DB::select('Select * from shoes where id=?',[$id])[0];
      $categories = Category::all();
      return view('home.edit', compact('shoes', 'categories'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'title'=>'required',
        'body'=>'required',
        'price'=>'required'
      ]);

      DB::update("Update shoes set title=:title, body=:body, price=:price where id=:id", ['title'=>$request->title, 'body'=>$request->body,'price'=>$request->price, 'id'=>$id]);
      return redirect(route('home'))->with('message',"Oglas azuriran");
    }

    public function destroy($id)
    {
      DB::delete('Delete from shoes where id=?',[$id]);
      return redirect(route('home'))->with('message',"Oglas obrisan");
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $oglas = Shoes::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "title" => $oglas->title,
                "image1" => $oglas->image1,
                "price" => $oglas->price,
                "quantity" => 1
            ];
        }
 
        session()->put('cart', $cart);
        return redirect()->back();
    }
 
    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
              unset($cart[$request->id]);
              session()->put('cart', $cart);
            }
        }
    }
}
