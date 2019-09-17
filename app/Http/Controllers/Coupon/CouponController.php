<?php

namespace App\Http\Controllers\Coupon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Model\CateModel;

class CouponController extends Controller
{
    public function couponadd(){
        return view("coupon.coupon");
    }

    public function couponmedo(){
        $id=Auth::id();
        $code=Str::random(8);
        $data=[
            "code"=>$code,
            "order"=>null,
            "u_id"=>$id,
            "get_time"=>time(),
            "expire_at"=>time()+3600*24*3,
        ];
        dd($data);
    }

}
