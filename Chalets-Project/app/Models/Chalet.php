<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chalet extends Model
{
    use HasFactory;
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function Appointment(){
        return $this->hasMany(Appointment::class);
    }
}
