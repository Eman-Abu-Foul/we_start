<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory , Trans;

    protected $guarded = [];

    protected $appends = [ 'trans_name','en_name', 'ar_name'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault();
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
//    public function setNameAttribute()
//    {
//        $name = [
//            'en' => request()->en_name,
//            'ar' => request()->ar_name
//        ];
//
//        $name = json_encode($name, JSON_UNESCAPED_UNICODE);
//
//        $this->attributes['name'] = $name;
//    }
//
//
//    public function getTransNameAttribute()
//    {
//        return json_decode( $this->name, true )[app()->getLocale()];
//    }
//
//    public function getEnNameAttribute()
//    {
//        return json_decode( $this->name, true )['en'];
//    }
//
//    public function getArNameAttribute()
//    {
//        return json_decode( $this->name, true )['ar'];
//    }
}
