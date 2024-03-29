<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Trans;
    protected $guarded = [];
    protected $appends = [ 'trans_name','en_name', 'ar_name'];

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->where('feature', 1);
    }
    public function gallery()
    {
        return $this->morphMany(Image::class, 'imageable')->where('feature', 0);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function coupons()
    {
        return $this->hasOne(Coupon::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFinalPriceAttribute()
    {
        $coupon = $this->coupons;
        if($coupon) {
            if($coupon->type == 'value') {
                return $this->price - $coupon->value;
            }else {
                return $this->price - (($coupon->value / 100) * $this->price);
            }
        }
        return $this->price;
    }

}
