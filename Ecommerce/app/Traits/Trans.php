<?php

namespace App\Traits;

trait Trans {
    public function setNameAttribute($value)
    {
        if(request()->en_name && request()->ar_name) {
            $name = [
                'en' => request()->en_name,
                'ar' => request()->ar_name
            ];
        }else {
            $value = json_decode($value, true);
            $name = [
                'en' => $value['en'],
                'ar' => $value['ar']
            ];
        }


        $name = json_encode($name, JSON_UNESCAPED_UNICODE);

        $this->attributes['name'] = $name;
    }

    public function getTransNameAttribute()
    {
        if($this->name) {
            return json_decode( $this->name, true )[app()->getLocale()];
        }

        return $this->name;

    }

    public function getEnNameAttribute()
    {
        if($this->name) {
            return json_decode( $this->name, true )['en'];
        }

        return $this->name;

    }

    public function getArNameAttribute()
    {
        if($this->name) {
            return json_decode( $this->name, true )['ar'];
        }

        return $this->name;
    }
}
