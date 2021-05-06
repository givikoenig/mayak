<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $table = 'header_main';
    protected $fillable = ['title', 'title2','title3', 'subtitle', 'active'];
}
