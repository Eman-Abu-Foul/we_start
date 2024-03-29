<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function skillable()
    {
        return $this->morphTo();
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
