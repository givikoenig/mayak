<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    //
    protected $table = 'tariffs';
    protected $fillable = ['title','subtitle','text','active'];
}
