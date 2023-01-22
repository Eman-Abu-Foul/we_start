<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'bod',
        'type',
        'password',
    ];

//    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class)->withDefault(['image' => 'No Image Avialble']);
    }
    public function works()
    {
        return $this->hasMany(Work::class);
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function() {
                $src = 'https://ui-avatars.com/api/?background=random&name='.$this->fname;
                // $src = '';

                if($this->image) {
                    $src = asset($this->image->path);
                }

                return $src;
            },
        );
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function sentMessages()
    {
        return $this->hasMany(Message::class,'sender_id');
    }
    public function receivedMessages()
    {
        return $this->hasMany(Message::class,'recipient_id');
    }
}
