<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\HomeCategoriesResource;
use App\Http\Resources\ProductsResource;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class SiteController extends Controller
{
    public function home_categories()
    {
        $data = Category::has('products')->withCount('products')->OrderByDesc('products_count')->limit(6)->get();
        $data = HomeCategoriesResource::collection($data);
        return BaseController::msg(1,'All Categories',200,$data);
    }
    protected function product()
    {
//        App::setlocale(request()->lang);
        $data = ProductsResource::collection(Product::with('image', 'gallery', 'variations', 'category', 'reviews')->get());
        return BaseController::msg(1, 'All Product', 200, $data);
    }
    public function add_to_cart(Request $request)
    {
//        return$request->all();
        $product = Product::find($request->product_id);

        Cart::updateOrCreate([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
        ], [
            'coupon_id' => $product->coupons ? $product->coupons->id : null,
            'quantity' => DB::raw('quantity + ' . $request->quantity),
            'price' => $product->final_price
        ]);
    }

    public function cart(Request $request)
    {
        return CartResource::collection(Cart::where('user_id', $request->user_id)->get());
    }
    public function add_to_user(Request $request)
    {
        Cart::where('user_id', $request->user_token)->update(['user_id' => $request->user_id]);

        return Cart::where('user_id', $request->user_id)->get();
    }

    public function verify_otp(Request $request)
    {
        $code = implode($request->number);
        $user = $request->user();

        $update = User::where('id', $user->id)->where('otp_code', $code)->update(['otp_verified_at' => now()]);

        if($update) {
            return now();
        }else {
            return null;
        }
    }
}
