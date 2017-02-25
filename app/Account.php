<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table = 'accounts';

    protected $fillable = [
        'username', 'site_title', 'portfolio_url', 'custom_domain', 'password_protected', 'meta_title', 'meta_description', 'google_analytics', 'available', 'show_domain', 'template_name', 'logo_image', 'favicon_image', 'is_active', 'is_upgrade',
    ];
}
