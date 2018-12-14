<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = 'rooms';
    protected $fillable = ['images','title','subtitle','text','icons','active'];

    public function setImagesAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['images'] = json_encode($pictures);
        }
    }

    public function getImagesAttribute($pictures)
    {
        return json_decode($pictures, true);
    }

    public function setIconsAttribute($services) {
        if (is_array($services)) {
            $this->attributes['icons'] = json_encode($services);
        }
    }

    public function getIconsAttribute($services) {
        return json_decode($services, true);
    }

}
