<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $table = 'pages';

    protected $fillable = [
        'title', 'description', 'image_name', 'meta_title', 'meta_description', 'permalink', 'password_protected', 'nav_menu_label', 'username', 'is_active',
    ];
}
