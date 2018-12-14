<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutServices extends Model
{
    //
    protected $table = 'about_services';
    protected $fillable = ['title', 'subtitle', 'img', 'text'];
}
