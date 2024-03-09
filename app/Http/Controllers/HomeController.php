<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Shoes;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_shoes = Shoes::all();
        return view('home', compact('all_shoes'));
    }

    public function newShoes()
    {
      $categories = Category::all();
      return view('home.newShoes', compact('categories'));
    }

    public function storeShoes(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
            'price'=>'required',
            'image1'=>'mimes:jpg,png,jpeg',
            'image2'=>'mimes:jpg,png,jpeg',
            'image3'=>'mimes:jpg,png,jpeg',
            'category'=>'required'
        ]);

        if(request()->hasFile('image1'))
        {
            $image1 = request()->file('image1');
            $image1_name = time().'1.'.$image1->extension();
            $image1->move(public_path('shoes_images'),$image1_name);
        }

        if(request()->hasFile('image2'))
        {
            $image2 = request()->file('image2');
            $image2_name = time().'2.'.$image2->extension();
            $image2->move(public_path('shoes_images'),$image2_name);
        }

        if(request()->hasFile('image3'))
        {
            $image3 = request()->file('image3');
            $image3_name = time().'3.'.$image3->extension();
            $image3->move(public_path('shoes_images'),$image3_name);
        }

        Shoes::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'price'=>$request->price,
            'image1'=>(isset($image1_name)) ? $image1_name : null,
            'image2'=>(isset($image2_name)) ? $image2_name : null,
            'image3'=>(isset($image3_name)) ? $image3_name : null,
            'user_id'=>Auth::user()->id,
            'category_id'=>$request->category
        ]);

        return redirect(route('home'))->with('message',"Oglas kreiran");
    }

    public function oglas($id)
    {
      $oglas = Shoes::find($id);
      return view('home.oglas', compact('oglas'));
    }

    public function addDeposit()
    {
      return view('home.addDeposit');
    }

    public function storeDeposit(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'deposit'=>'required|max:5'
        ],
        [
            'deposit.max'=>'Ne mozete dodati vise od 99999rsd!'
        ]
        );

        $user->deposit += $request->deposit;
        $user->save();

        return redirect(route('home.addDeposit'))->with('message','Depozit uspesno dodat!');
    }

    public function subtractDeposit(Request $request)
    {
        if($request->id) {
          $cart = session()->get('cart');
          if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
          }
        }

        $user = Auth::user();
    
        $request->validate([
            'id' => 'required',
        ]);

        $product = Shoes::findOrFail($request->id);
        $price = $product->price;

        $user->deposit -= $price;
        $user->save();
    }
}