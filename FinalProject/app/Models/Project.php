<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function tag()
    {
        return $this->morphMany(Tag::class, 'skillable');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
