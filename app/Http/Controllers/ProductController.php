<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $coupon=null;

    public function __construct(Coupon $coupon){
        $this->coupon = $coupon;
    }

    public function index(Request $request){
        $product = DB::table('shops')->get();
        return view('product.index')->with('product',$product);
    }
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
                $data = session()->put('cart');

                return redirect()->route('product.cart')->with('success','Added to Cart');
        }

            if(isset($cart[$shop->id])){
                    $cart[$shop->id]['quantity']++;
                    $data = session()->put('cart',$cart);

            }

            return redirect()->route('product.cart')->with('success','Added to Cart');

    }


    public function apply(Request $request){
        // Through query
        // $coupon = DB::table('coupons')
        // ->where('coupon_code', $request->coupon_code)
        // ->first();

       $coupon = $this->coupon->where('coupon_code',$request->coupon_code)->first();
       if($coupon){
           if($coupon->status == 'active'){
               $exp_date = $coupon->expiry_date;
               $current_date = date('Y-m-d');
                if($exp_date > $current_date ){

                    $total = 1000;
                    if($coupon->coupon_type == 'amount'){
                        $final_price = $total - $coupon->discount_value;
                    } else{
                        $final_price =$total * ($coupon->discount_value/100);
                    }
                            return view('product.index')
                            ->with('total',$total)
                            ->with('final_price',$final_price);
                } else {
                    return redirect()->route('product.index')->with('error','Coupon expired.Please try again');
                }
            }
        } else{
            return redirect()->route('product.index')->with('error','Invalid coupon code.Please try again');
        }
        session()->put('coupon',[
            'code' => $coupon->coupon_code,
        ]);
    }


}
