<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function contract()
    {
        return $this->hasOne(Contract::class)->withDefault();
    }
}
