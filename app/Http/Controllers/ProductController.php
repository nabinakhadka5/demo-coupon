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
                session()->put('coupon',[
                    'code' => $coupon->coupon_code,
                    'coupon_type' => $coupon->coupon_type,
                    'discount_value' => $coupon->discount_value,
                ]);
                return redirect()->route('product.cart')->with('success','Coupon applied');
               } else {
                    return redirect()->route('product.cart')->with('error','Coupon expired.Please try again');
                }
            }
        } else{
            return redirect()->route('product.cart')->with('error','Invalid coupon code.Please try again');
       }

       }
    }

