<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $table = 'about_main';
    protected $fillable = ['title', 'subtitle', 'text', 'active', 'keywords', 'meta_desc'];
}
