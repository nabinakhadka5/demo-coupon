<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coupon_code' =>['required','string','max:150','unique:coupons'],
            'discount_value' =>['required','integer'], //max:product price
            'expiry_date' => ['required','date'],
            'status' => ['required','in:active,inactive'],
            'coupon_type' => ['required','in:percentage,amount']
        ];
    }
}
