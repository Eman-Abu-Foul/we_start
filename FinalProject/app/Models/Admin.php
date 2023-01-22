<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function() {
                $src = 'https://ui-avatars.com/api/?background=random&name='.$this->name;
                // $src = '';

                if($this->image) {
                    $src = asset($this->image->path);
                }

                return $src;
            },
        );
    }
}
