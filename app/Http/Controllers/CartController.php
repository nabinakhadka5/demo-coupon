<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart(){
        return view('shop.cart');
    }



    public function cartAdd(Shop $shop){
        $cart = session()->get('cart');
        if(!$cart){
            $cart =[
                $shop->id => [
                    'title' => $shop->title,
                    'price' => $shop->price,
                    'quantity' => 1,
                    'product_code' => $shop->product_code,
                    ]

                ];
                session()->put('cart',$cart);

                return redirect()->route('product.cart')->with('success','Added to Cart');
        }
            if(isset($cart[$shop->id])){
                    $cart[$shop->id]['quantity']++;
                    $data = session()->put('cart',$cart);

                    return redirect()->route('product.cart')->with('success','Added to Cart');
            }

        $cart[$shop->id]= [
            'title' => $shop->title,
            'price' => $shop->price,
            'quantity' => 1,
            'product_code' => $shop->product_code
        ];

        session()->put('cart',$cart);
        return redirect()->route('product.cart')->with('success','Added to Cart');


    }



}
