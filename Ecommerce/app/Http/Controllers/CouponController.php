<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $count =10;
//        if($request->has($count)){
//            $count = $request->count;
//
//        }
//        $coupons = Coupon::latest('id')->paginate($count);
//
//        if($request->has('search')){
//            $coupons = Coupon::where('name','like' , '%'. $request->search .'%')->latest('id')->paginate(10);
//        }

        $coupons = Coupon::latest('id')->paginate(10);
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.coupons.create',['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Coupon::create([
            'name' => '',
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'expire' => $request->expire,
            'usage' => $request->usage,
            'product_id' => $request->product_id,
        ]);
        return redirect()->route('admin.coupons.index')->with('msg', 'Coupon created successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return redirect()->route('admin.coupons.index',['coupon'=>$coupon]);
//        return $coupon;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update([
            'name' => '',
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'expire' => $request->expire,
            'usage' => $request->usage,
            'product_id' => $request->product_id
        ]);

        return $coupon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('admin.coupons.index')->with('msg', 'Coupon deleted successfullly')->with('type', 'danger');
    }
}
