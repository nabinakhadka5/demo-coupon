<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $coupon=null;
    protected $total=null;


    public function __construct(Coupon $coupon){
        $this->coupon = $coupon;
    }

    public function index(Request $request){

        return view('product.index')->with('total',$this->total);
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

                $total = 5000;
                if($coupon->coupon_type == 'amount'){
                     $final_price = $total - $coupon->discount_value;
                }

                if($coupon->coupon_type == 'percentage'){
                     $final_price = $total * ($coupon->discount_value/100);
                }

                return redirect()->route('product.show')
                                    ->with('final_price',$final_price)
                                    ->with('total',$total)
                                    ->with('success','Coupon is valid!');
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
