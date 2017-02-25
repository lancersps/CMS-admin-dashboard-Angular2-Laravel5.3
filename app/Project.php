<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';

    protected $fillable = [
        'title', 'description', 'meta_title', 'meta_description', 'img_name', 'date', 'client', 'role', 'permalink', 'tags', 'password_protected','project_external_url', 'is_active', 'username',
    ];
}
